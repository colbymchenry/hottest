<?php

namespace App\Http\Controllers;

use App\Http\AlertHelper;
use App\Http\Controllers\Products\BaseProduct;
use App\Model;
use App\PayPal\BillingAgreement;
use App\PayPal\Checkout;
use App\PayPal\PayPalToken;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller {
// TODO: Need to fix redirects once I have pages from Robert
    public function __construct() {
        $this->middleware('auth');
    }

    public function createCheckout($model_id, $product_type) {
        if (!User::where('id', $model_id)->where('is_model', true)->exists()) {
            AlertHelper::alertWarning('Model could not be found.');
            return redirect('/home');
        }

        $model = new Model($model_id);

        if ($model->getPricing($product_type)->price == null) {
            AlertHelper::alertWarning('Model doesn\'t have premium setup for that.');
            return redirect('/home');
        }

        $price = $model->getPricing($product_type)->price;

        $product = new BaseProduct($product_type, $price, $model, $product_type);
        return $product->createCheckout();
    }

    public function createBillingAgreementCheckout($model_id, $product_type) {
        if (!User::where('id', $model_id)->where('is_model', true)->exists()) {
            AlertHelper::alertWarning('Model could not be found.');
            return redirect('/home');
        }

        $model = new Model($model_id);

        if ($model->getPricing($product_type)->price == null) {
            AlertHelper::alertWarning('Model doesn\'t have premium setup for that.');
            return redirect('/model/' . $model->getUser()->name);
        }

        $price = $model->getPricing($product_type)->price;

        $product = new BaseProduct($product_type, $price, $model, $product_type);
        return $product->createBillingAgreementCheckout();
    }


    public function executeCheckout() {
        return Checkout::executeCheckout();
    }

    public function executeBillingAgreementCheckout() {
        return BillingAgreement::executeCheckout();
    }

    public function ConnectAccount() {
        $code = \request('code');
        if (PayPalToken::genAndStoreTokens($code)) {
            AlertHelper::alertSuccess('PayPal account connected!');
        } else {
            AlertHelper::alertDanger('Failed to connect PayPal account!');
        }

        Session::put('view_settings', true);
        return redirect('/model/' . Auth::user()->name);
    }

}