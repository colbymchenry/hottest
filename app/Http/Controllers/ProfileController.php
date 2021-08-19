<?php

namespace App\Http\Controllers;

use App\Events\BroadcastChat;
use App\Events\BroadcastTyping;
use App\Http\AlertHelper;
use App\Http\Controllers\Products\ProductType;
use App\ImageHelper;
use App\Message;
use App\Model;
use App\ModelImage;
use App\PayPal\Checkout;
use App\PayPal\CheckoutCredits;
use App\ProfileReport;
use App\RemoteDataServer;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function updateAvatar(Request $request) {
        $imageUpload = $this->uploadImage($request['data']);

        if(!$imageUpload['success']) {
            return response()->json(['success' => false, 'msg' => $imageUpload['msg']]);
        }

        $image = ModelImage::where('id', $imageUpload['id'])->get()[0];
        $user = User::where('id', Auth::user()->id)->get()[0];
        $user->avatar = $image->id;
        $user->save();
        return response()->json(['success' => true, 'img-url' => $image->getLink(), 'img-id' => $image->id]);
    }

    public function uploadImage(UploadedFile $file) {
        // TODO: Get validation working
//        try {
//            $this->validate($file, ['user_photo' => 'mimes:png,jpeg,jpg,gif | max:2048',]);
//        } catch (ValidationException $e) {
//            return ['success' => false, 'msg' => $e->getMessage()];
//        }

        $photoID = uniqid(Auth::user()->id);
        $photoName = $photoID . '.png';

        $imageInfo = getimagesize($file);
        list($width, $height) = $imageInfo;
        ImageHelper::compress($file, public_path('pending_uploads') . '/' . $photoName, 100);

        try {
            $server = RemoteDataServer::findOptimalServer();

            if ($server == null) return ['success' => false, 'msg' => 'There is no more server space! Notify an admin.'];

            $ftpObj = $server->getFTPConnection();
            $ftpObj->changeDir('files/images');
            $ftpObj->uploadFile(public_path('pending_uploads/' . $photoName), $photoName);
            File::delete(public_path('pending_uploads/' . $photoName));
            $ftpObj->setFilePermission($photoName);

            $modelImage = new ModelImage();
            $modelImage->server_id = $server->id;
            $modelImage->model_id = Auth::user()->id;
            $modelImage->width = $width;
            $modelImage->height = $height;
            $modelImage->file_name = $photoName;
            $modelImage->description = '';
            $modelImage->listed = false;
            $modelImage->vip = false;
            $modelImage->tags = '';
            $modelImage->for_avatar = true;
            $modelImage->save();
        } catch (\Exception $e) {
            Log::error($e);
            return ['success' => false, 'msg' => $e->getMessage()];
        }

        return ['success' => true, 'id' => $modelImage->id];
    }

    public function reportProfile(Request $request) {
        if(!$request->has('profile_id')) {
            return response()->json(['success' => false, 'msg' => 'You must include a profile!']);
        }

        if(!$request->has('reason')) {
            return response()->json(['success' => false, 'msg' => 'You must include a reason!']);
        }

        if(ProfileReport::where('profile_id', $request['profile_id'])->where('reporter_id', Auth::user()->id)->exists()) {
            return response()->json(['success' => false, 'msg' => 'You\'ve already reported that user.']);
        }

        $report = new ProfileReport();
        $report->profile_id = $request['profile_id'];
        $report->reason = $request['reason'];
        if($request->has('info')) {
            $report->info = $request['info'];
        }
        $report->reporter_id = Auth::user()->id;
        $report->save();
        return response()->json(['success' => true]);
    }

}
