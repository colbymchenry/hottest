<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    protected $fillable = ['invoice_id', 'billing_agreement_id', 'payer_id', 'user_id', 'model_id'];

    public static function getLastPayment($model_id, $user_id) {
        if (!Transaction::where('user_id', $user_id)->where('model_id', $model_id)->exists()) return null;
        return Transaction::orderBy('CREATED_AT', 'desc')->where('user_id', $user_id)->where('model_id', $model_id)->get()[0];
    }

}
