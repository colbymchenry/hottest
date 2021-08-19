<?php

namespace App\PayPal;


use App\Http\AlertHelper;
use App\Model;
use App\ModelPricing;
use App\Transaction;
use App\User;
use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Agreement;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Payer;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Common\PayPalModel;

class BillingAgreement {

    private $model;
    public $description;
    public $price;
    public $name;
    public $productType;

    public function __construct(Model $model = null, $productType = null, $name = null, $description = null, $price = 1) {
        $this->model = $model;
        $this->productType = $productType;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function create($price) {
        $apiContext = PayPalUtil::ApiContext();
        $plan = new Plan();
        $months = 1;

        $pattern = '/^(0|[1-9]\d*)(\.\d{2})?$/';
        if (preg_match($pattern, $price) == '0')
            throw new Exception('Invalid price.');

        // The plan includes a description and name, this can be customized to fit specific needs
        $plan->setName($this->name)
            ->setDescription($this->description)
            ->setType('fixed');

        // The Payment Definitions include the intervals, the frequency, and the price at which the client will be charged
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
            ->setType('REGULAR')
            ->setFrequency('Month')
            ->setFrequencyInterval($months)
            ->setCycles("12")
            ->setAmount(new Currency(array('value' => $price, 'currency' => 'USD')));

        $merchantPreferences = new MerchantPreferences();

        // If you ever change the return url must update all payment plans
        // Merchant Preferences includes everything at the initial checkout for the end user
        $merchantPreferences->setReturnUrl(route(PayPalUtil::BillingAgreementExecuteURL()) . '?success=true&type=' . $this->productType . '&model=' . $this->model->getUser()->id)
            ->setCancelUrl(route(PayPalUtil::BillingAgreementExecuteURL()) . '?success=false&type=' . $this->productType . '&model=' . $this->model->getUser()->id)
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0")
            ->setSetupFee(new Currency(array('value' => $price, 'currency' => 'USD')));

        // Update the plan with the new payment definitions and merchant preferences
        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);
        $plan->create($apiContext);

        // Activate the plan
        $patch = new Patch();
        $value = new PayPalModel('{
	       "state":"ACTIVE"
	     }');
        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);
        $plan->update($patchRequest, $apiContext);
        // Update the product to include the billing agreement ID
        $pricing = new ModelPricing();
        $pricing->user_id = $this->model->getUser()->id;
        $pricing->billing_agreement_id = $plan->getId();
        $pricing->price = $price;
        $pricing->product_type = $this->productType;
        $pricing->save();
    }

    public static function createCheckout($plan_id, $product_type, Model $model) {
        $apiContext = PayPalUtil::ApiContext();

        $months = 1;

        if (!$model->hasPricing($product_type)) {
            throw new Exception("Model has not setup a billing agreement for that product type.");
        }

        $pricing = $model->getPricing($product_type);

        // add 1 minute to the current time for the plan to start
        $date = new DateTime('now', new DateTimeZone('UTC'));
        $date->add(new DateInterval('PT' . 1 . 'M'));
        // get the plan from PayPal tied to that ID
        $plan = Plan::get($plan_id, $apiContext);
        $price = $plan->toArray()['payment_definitions'][0]['amount']['value'];
        // setup the payer
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // setup the agreement to show to the user at checkout
        $description = $plan->getDescription();
        $agreement = new Agreement();
        $agreement->setName($plan->getName())
            ->setDescription($description)
            ->setStartDate($date->format(DATE_ISO8601));

        $newPlan = new Plan();
        $newPlan->setId($plan_id);

        $agreement->setPlan($newPlan);
        $agreement->setPayer($payer);

        $agreement->create($apiContext);
        return $agreement->getApprovalLink();
    }

    public static function executeCheckout() {
        $apiContext = PayPalUtil::ApiContext();
        $access_token = \request('token');

        $success = \request('success');
        $type = \request('type');
        $modelId = \request('model');

        if (!User::where('id', $modelId)->exists()) {
            AlertHelper::alertWarning('Could not complete transaction. Model not found by that ID.');
            return redirect('/home');
        }

        $modelUser = User::where('id', $modelId)->get()[0];
        if (!$modelUser->is_model) {
            AlertHelper::alertWarning('Could not complete transaction. That user is not a model.');
            return redirect('/home');
        }

        $model = new Model($modelId);

        if (!$model->hasPricing($type)) {
            AlertHelper::alertWarning('Model has not setup subscriptions for that product type.');
            return redirect('/home');
        }

        $pricing = $model->getPricing($modelId);

        if ($success == 'true') {
            $agreement = new Agreement();
            try {
                $agreement->execute($access_token, $apiContext);
                $transaction = new Transaction();
                $transaction->billing_agreement_id = $agreement->getId();
                $transaction->model_id = $modelId;
                $transaction->user_id = Auth::user()->id;
                $transaction->product_type = $type;
                $transaction->save();
            } catch (Exception $ex) {
                AlertHelper::alertDanger($ex->getMessage());
                Log::error($ex);
                Session::remove('current-product');
                return redirect('/home');
            }

            AlertHelper::alertSuccess('Success! You are now subscribed to ' . $modelUser->name . '\'s premium ' . $type . ' content.');
            Session::remove('current-product');
            return redirect('/model/' . $modelUser->name);
        } else {
            AlertHelper::alertWarning('You cancelled the order.');
            Session::remove('current-product');
            return redirect('/model/' . $modelUser->name);
        }
    }

    public function delete($product_type) {
        $apiContext = PayPalUtil::ApiContext();
        $pricing = $this->model->getPricing($product_type);
        $plan = Plan::get($pricing->billing_agreement_id, $apiContext);
        $plan->delete($apiContext);
        $pricing->delete();
    }

}