<?php
/**
 * Created by PhpStorm.
 * User: colbymchenry
 * Date: 2019-02-26
 * Time: 17:10
 */

namespace App\PayPal;


use App\Events\BroadcastPurchasedCredits;
use App\Http\AlertHelper;
use App\Http\Controllers\Products\ProductType;
use App\Model;
use App\User;
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

class CheckoutCredits {

    var $apiContext;
    var $payment;

    public function __construct($quantity) {
        $this->apiContext = PayPalUtil::ApiContext();
        // initialize the payer
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        // set the correct price depending on the product
        // create the item
        $price = 1;
        $item = new Item();
        $item->setName('Flame Credit')
            ->setCurrency('USD')
            ->setQuantity($quantity)
            ->setSku(0000)
            ->setPrice($price);
        // add the item to an ItemList
        $itemList = new ItemList();
        $itemList->setItems(array($item));
        // setup the details and tax
        $details = new Details();
        $tax = ($price * $quantity) * 0.05;
        $details->setTax($tax)->setSubtotal($price * $quantity);
        // create the overall amount to be paid
        $amount = new Amount();
        $amount->setCurrency("USD")->setTotal(($price * $quantity) + $tax)->setDetails($details);
        // create the transaction with its appropriate details
        $invoice_id = uniqid();
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber($invoice_id);
        // setup the return urls for after they've paid
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route(PayPalUtil::CheckoutCreditExecuteURL()) . '?success=true&amount=' . $quantity)->setCancelUrl(route(PayPalUtil::CheckoutCreditExecuteURL()) . '?success=false&amount=' . $quantity);
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

        if (!$success) {
            return null;
        }

        $paymentId = \request('paymentId');
        $payerId = \request('PayerID');
        $amount = \request('amount');

        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $apiContext);
            $payment = Payment::get($paymentId, $apiContext);
            $transaction = new \App\Transaction();
            $transaction->invoice_id = $result->getTransactions()[0]->invoice_number;
            $transaction->user_id = Auth::user()->id;
            $transaction->model_id = -1;
            $transaction->product_type = ProductType::$MESSAGE;
            $transaction->save();

            $user = User::where('id', Auth::user()->id)->get()[0];
            $user->credits = $user->credits + $amount;
            $user->save();
        } catch (Exception $ex) {
            Log::error($ex);
            Log::error($ex->getData());
            return null;
        }

        // TODO: Refresh main window and take away credits when sending a message
        event(new BroadcastPurchasedCredits('Credits purchased!', true, $user->credits, Auth::user()->id));
        return response()->json(['success' => true]);
    }
}