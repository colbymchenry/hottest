<?php
/**
 * Created by PhpStorm.
 * User: colbymchenry
 * Date: 2019-02-26
 * Time: 17:12
 */

namespace App\PayPal;


use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalUtil {

    public static function ApiContext() {
        $apiContext = new ApiContext(new OAuthTokenCredential('AUuAYNyNVzETws2ZZeuOJ3i5bnjxlX9sYcg2nVovKTLWjjFdhcNgMOMCgkDrV3DZfb17yjwlHpz55t6C', 'EBzhmrac4ip-jhLX824J470bOTg9NiGWXITBpIxRqNeIsWWqWPbD2kqIdI8GWJBlEfuPrN3Be-lwC7Zk'));
        return $apiContext;
    }

    public static function BillingAgreementExecuteURL() {
        return 'execute-agreement';
    }

    public static function CheckoutExecuteURL() {
        return 'execute-checkout';
    }

    public static function CheckoutCreditExecuteURL() {
        return 'execute-credit-checkout';
    }

}