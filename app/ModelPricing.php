<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPricing extends Model
{

    protected $fillable = ['user_id', 'price', 'billing_agreement_id', 'product_type'];

    public function getModelName() {
        if(!User::where('id', $this->user_id)->exists()) return null;
        $user = User::where('id', $this->user_id)->get()[0];
        return $user->name;
    }

}
