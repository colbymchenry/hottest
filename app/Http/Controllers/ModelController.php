<?php

namespace App\Http\Controllers;


use App\Follower;
use App\Http\AlertHelper;
use App\Http\Controllers\Products\BaseProduct;
use App\Http\Controllers\Products\ProductType;
use App\Model;
use App\ModelImage;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ModelController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    // for testing
    public function colbysMain() {
        return view('colbys_test_views.main');
    }

    public function index($name) {
        if($name === 'service-worker.js') return null;
        if (!User::where('name', $name)->exists()) {
            AlertHelper::alertDanger('Model by that name not found.');
            return redirect('/home');
        }

        $user = User::where('name', $name)->get()[0];
        if (!$user->is_model) {
            AlertHelper::alertDanger('Model by that name not found.');
            return redirect('/home');
        }

        $model = new Model($user->id);

        return view('model')->with('model', $model)->with('images', $model->getAllListedPhotos())->with('vip_access', Auth::user()->isSubscribed($user->id))->with('participant', $user);
    }

    public function getFollowers() {
        if(!Auth::user()->is_model || !Follower::where('followee', Auth::user()->id)->exists()) return response()->json(['success' => false]);
        $followers = array();

        foreach (Follower::where('followee', Auth::user()->id)->get() as $follower) {
            array_push($followers, User::where('id', $follower['follower'])->get()->toArray());
        }

        return response()->json(['success' => true, 'followers' => $followers]);
    }

    public function registerNewModel() {
        Auth::user()->is_model = true;
        Auth::user()->save();
        AlertHelper::alertSuccess('You are now a Foxxy model. (Testing only)');
        return redirect('/colby_main');
    }

    public static function setPrices() {
        $vip = \request('VIP');
        $snapchat = \request('SNAPCHAT');
        $messages = \request('MESSAGE');

        $model = new Model(Auth::user()->id);

        Session::put('view_settings', true);

        if (!$model->getUser()->is_model) {
            AlertHelper::alertWarning('You are not a model.');
            return redirect('/model/' . Auth::user()->name);
        }

        if ($snapchat != null && $model->getPricing(ProductType::$SNAPCHAT)->price != $snapchat) {
            $product = new BaseProduct(ProductType::$SNAPCHAT, $snapchat, $model, 'Snapchat');
            $product->createBillingAgreement();
        }

        if ($vip != null && $model->getPricing(ProductType::$VIP)->price != $vip) {
            $product = new BaseProduct(ProductType::$VIP, $vip, $model, 'VIP');
            $product->createBillingAgreement();
        }

        if ($messages != null && $model->getPricing(ProductType::$MESSAGE)->price != $messages) {
            $product = new BaseProduct(ProductType::$MESSAGE, $messages, $model, 'Message');
            $product->createBillingAgreement();
        }

        AlertHelper::alertSuccess('Prices updated!');
        return redirect('/model/' . Auth::user()->name);
    }

    public function setBanner($imgID) {
        if (!Auth::user()->is_model) {
            return response()->json(['success' => false, 'msg' => 'You are not a model.']);
        }

        if (!ModelImage::where('id', $imgID)->exists()) {
            return response()->json(['success' => false, 'msg' => 'Image not found.']);
        }

        $model = new Model(Auth::user()->id);
        $page = $model->getPageDetails();
        $page->banner = $imgID;
        $page->save();

        return response()->json(['success' => true, 'url' => ModelImage::where('id', $imgID)->get()[0]->getLink()]);
    }

    public function setAvatar($imgID) {
        Session::put('view_settings', true);

        if (!Auth::user()->is_model) {
            AlertHelper::alertWarning('You are not a model.');
            return redirect('/home');
        }

        if (!ModelImage::where('id', $imgID)->exists()) {
            AlertHelper::alertWarning('Image not found.');
            return redirect('/model/' . Auth::user()->name);
        }


        $model = new Model(Auth::user()->id);
        $page = $model->getPageDetails();
        $page->avatar = $imgID;
        $page->save();

        AlertHelper::alertSuccess('Avatar photo updated!');
        return redirect('/model/' . Auth::user()->name);
    }

    public function SearchForModel($name) {
        $array = User::orderBy('name', 'asc')->where('name', 'LIKE', $name . '%')->where('is_model', true)->take(20)->get();
        $toReturn = array();
        foreach($array as $item) {
            $data = $item;
            $data['avatar'] = $item->getAvatar();
            array_push($toReturn, $data);
        }
        return response()->json($toReturn);
    }

}