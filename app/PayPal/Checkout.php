<?php
/**
 * Created by PhpStorm.
 * User: colbymchenry
 * Date: 2019-02-26
 * Time: 17:10
 */

namespace App\PayPal;


use App\Http\AlertHelper;
use App\Model;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\InputFields;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\WebProfile;

class Checkout {

    var $apiContext;
    var $model;
    var $payment;

    public function __construct(Model $model, $product_type) {
        $this->apiContext = PayPalUtil::ApiContext();
        // initialize product variable
        $this->model = $model;
        $pricing = $model->getPricing($product_type);
        // initialize the payer
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        // set the correct price depending on the product
        // create the item
        $item = new Item();
        $item->setName($pricing->getModelName())
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku($pricing->user_id) // use the model's user ID as the sku for the product
            ->setPrice($pricing->price);
        // add the item to an ItemList
        $itemList = new ItemList();
        $itemList->setItems(array($item));
        // setup the details and tax
        $details = new Details();
        $tax = $pricing->price * 0.05;
        $details->setTax($tax)->setSubtotal($pricing->price);
        // create the overall amount to be paid
        $amount = new Amount();
        $amount->setCurrency("USD")->setTotal($pricing->price + $tax)->setDetails($details);
        // create the transaction with its appropriate details
        $invoice_id = uniqid();
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber($invoice_id);
        // setup the return urls for after they've paid
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route(PayPalUtil::CheckoutExecuteURL()) . '?success=true&model=' . $model->getUser()->id . '&type=' . $product_type)->setCancelUrl(route(PayPalUtil::CheckoutExecuteURL()) . '?success=false&model=' . $model->getUser()->id . '&type=' . $product_type);
        // create the payment
        $this->payment = new Payment();
        // remove shipping options from the checkout
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);
        $webProfile = new WebProfile();
        $webProfile->setName($invoice_id)->setInputFields($inputFields);
        $webProfileId = $webProfile->create($this->apiContext)->getId();
        $this->payment->setExperienceProfileId($webProfileId);
        // setup the last details for the payment
        $this->payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
    }

    public function createCheckout() {
        $this->payment->create($this->apiContext);
    }

    public static function executeCheckout() {
        $apiContext = PayPalUtil::ApiContext();
        $success = \request('success');

        if(!$success) {
            return null;
        }

        $paymentId = \request('paymentId');
        $token = \request('token');
        $payerId = \request('PayerID');
        $modelId = \request('model');
        $productType = \request('type');

        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $apiContext);
            $payment = Payment::get($paymentId, $apiContext);
            $transaction = new \App\Transaction();
            $transaction->invoice_id = $result->getTransactions()[0]->invoice_number;
            $transaction->user_id = Auth::user()->id;
            $transaction->model_id = $modelId;
            $transaction->product_type = $productType;
            $transaction->save();
        } catch (Exception $ex) {
            Log::error($ex);
            return null;
        }

        $model = new Model($modelId);

        AlertHelper::alertSuccess('You now have 1 month of access to ' . $model->getUser()->name . '\'s premium ' . $productType . '!');
        return redirect('/model/' . $model->getUser()->name);
    }
}