<?php

namespace App\Http\Controllers\Products;


use App\Http\AlertHelper;
use App\Http\Controllers\Controller;
use App\PayPal\BillingAgreement;
use App\PayPal\Checkout;
use Exception;
use Illuminate\Support\Facades\Log;

class BaseProduct extends Controller {

    public $type;
    public $model;
    public $name;
    public $description;
    public $price;

    public function __construct($type, $price, $model, $name) {
        $this->type = $type;
        $this->price = $price;
        $this->model = $model;
        $this->name = $name;
        $this->description =  'Premium access to ' . $this->model->getUser()->name . '\'s ' . $name . ' content. You will be billed $' . $price . ' now and then on a monthly cycle.';
    }

    public function getName() { return $this->name; }

    public function getDescription() { return $this->description; }

    /**
     * ------------------------ SUBSCRIPTION CHECKOUT PROCEDURES -------------------------
     */

    public function createBillingAgreement() {
        try {
            $billingAgreement = new BillingAgreement($this->model, $this->type, $this->getName(), $this->getDescription($this->price), $this->price);
            $billingAgreement->create($this->price);
            AlertHelper::alertSuccess('Billing agreement created.');
        } catch (Exception $e) {
            Log::error($e);
            AlertHelper::alertDanger($e->getMessage());
            return false;
        }

        return true;
    }

    public function createBillingAgreementCheckout() {
        try {
            $plan_id = $this->model->getPricing($this->type)->billing_agreement_id;
            return redirect(BillingAgreement::createCheckout($plan_id, $this->type, $this->model));
        } catch (Exception $e) {
            AlertHelper::alertDanger($e->getMessage());
            Log::error($e);
            return redirect('/home');
        }
    }

    /**
     * ------------------------ NORMAL CHECKOUT PROCEDURES -------------------------
     */
    public function createCheckout() {
        // make sure they have a price for premium access
        if ($this->model->getPricing($this->type)->price == null) {
            AlertHelper::alertWarning('Sorry that model does not have premium ' . $this->type . ' enabled.');
            return redirect('/home');
        }

        try {
            $checkout = new Checkout($this->model, $this->type);
            $checkout->createCheckout();
            return redirect($checkout->payment->getApprovalLink());
        } catch (Exception $e) {
            Log::error($e);
            AlertHelper::alertDanger($e->getMessage());
        }

        return null;
    }

}