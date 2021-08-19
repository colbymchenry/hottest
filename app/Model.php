<?php

namespace App;

class Model {

    private $user_id;
    private $user;

    public function __construct($user_id) {
        $this->user_id = $user_id;
        $this->user = User::where('id', $user_id)->get()[0];
    }

    public function getUser() { return $this->user; }

    public function getPricing($product_type) {
        if(!ModelPricing::where('user_id', $this->user_id)->where('product_type', $product_type)->exists()) {
            $pricing = new ModelPricing();
            $pricing->user_id = $this->user_id;
            $pricing->product_type = $product_type;
            return $pricing;
        }
        return ModelPricing::orderBy('CREATED_AT', 'desc')->where('user_id', $this->user_id)->where('product_type', $product_type)->get()[0];
    }

    public function hasPricing($product_type) {
        return ModelPricing::where('user_id', $this->user_id)->where('product_type', $product_type)->exists();
    }

    public function getPageDetails() {
        if(!ModelPage::where('user_id', $this->user_id)->exists()) {
            $page = new ModelPage();
            $page->user_id = $this->user_id;
            return $page;
        }
        return ModelPage::where('user_id', $this->user_id)->get()[0];
    }

    public function getPublicPhotos() {
        return ModelImage::orderBy('CREATED_AT', 'desc')->where('model_id', $this->user_id)->where('listed', true)->where('vip', false)->where('for_message', false)->where('for_avatar', false)->where('for_banner', false)->get();
    }

    public function getVIPPhotos() {
        return ModelImage::orderBy('CREATED_AT', 'desc')->where('model_id', $this->user_id)->where('listed', true)->where('vip', true)->where('for_message', false)->where('for_avatar', false)->where('for_banner', false)->get();
    }

    public function getAllListedPhotos() {
        return ModelImage::orderBy('CREATED_AT', 'desc')->where('model_id', $this->user_id)->where('listed', true)->where('for_message', false)->where('for_avatar', false)->where('for_banner', false)->get();
    }

    public function getUnlistedPhotos() {
        return ModelImage::orderBy('CREATED_AT', 'desc')->where('model_id', $this->user_id)->where('listed', false)->where('for_message', false)->where('for_avatar', false)->where('for_banner', false)->get();
    }

    public function getAtLink() {
        $modelLink = '<a href="/model/' . $this->getUser()->name . '">';
        $span = "<span style='color: lightskyblue'>@" . $this->getUser()->name . "</span>";
        return $modelLink . $span . '</a>';
    }

    public function getBanner() {
        $modelPage = $this->getPageDetails();
        if(!ModelImage::where('id', $modelPage->banner)->exists()) {
            return '';
        }
        return ModelImage::where('id', $modelPage->banner)->get()[0]->getLink();
    }

}