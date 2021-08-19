<?php

namespace App\Http\Controllers;

use App\Http\AlertHelper;
use App\ImageHelper;
use App\ModelImage;
use App\RemoteDataServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ImageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function uploadImage(Request $request) {
        Session::put('view_settings', true);
//
//        try {
//            $this->validate($request, ['user_photo' => 'mimes:png,jpeg,jpg,gif | max:2048',]);
//        } catch (ValidationException $e) {
//            AlertHelper::alertWarning($e->getMessage());
//            return redirect('/model/' . Auth::user()->name);
//        }

        $photoID = uniqid(Auth::user()->id);
        $photoName = $photoID . '.' . $request->user_photo->getClientOriginalExtension();

        $imageInfo = getimagesize($request->user_photo);
        list($width, $height) = $imageInfo;
        ImageHelper::compress($request->user_photo, public_path('pending_uploads') . '/' . $photoName, 90);

        try {
            $server = RemoteDataServer::findOptimalServer();

            if ($server == null) {
                AlertHelper::alertDanger('There is no more server space! Notify an admin.');
                return redirect('/model/' . Auth::user()->name);
            }

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
            $modelImage->description = $request->description;
            $modelImage->listed = $request->type == 'unlisted' ? false : true;
            $modelImage->vip = $request->type == 'vip';
            $modelImage->tags = $request->tags;
            $modelImage->save();
        } catch (\Exception $e) {
            Log::error($e);
            AlertHelper::alertDanger($e->getMessage());
            return redirect('/model/' . Auth::user()->name);
        }

        AlertHelper::alertSuccess('Image uploaded!');
        return redirect('/model/' . Auth::user()->name);
    }

    public function likeImage($imgId) {
        if(!ModelImage::where('id', $imgId)->exists()) return;

        $image = ModelImage::where('id', $imgId)->get()[0];
        if($image->isLiked()) {
            $image->unlike();
        } else {
            $image->like();
        }

    }

    public function editImage(Request $request) {
        $imgID = $request['imgID'];
        $desc = $request['description'];
        $tags = $request['tags'];
        $type = $request['type'];

        if(!ModelImage::where('id', $imgID)->exists()) {
            return response()->json(['success' => false, 'msg' => 'Image doesn\'t exist.']);
        }

        $image = ModelImage::where('id', $imgID)->get()[0];

        if($image->model_id != Auth::user()->id) {
            return response()->json(['success' => false, 'msg' => 'You are not the owner of that image.']);
        }

        try {
            $image->description = $desc;
            $image->tags = $tags;
            $image->listed = $type == 'unlisted' ? false : true;
            $image->vip = $type == 'vip';
            $image->save();
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'msg' => 'Image updated!']);
    }

    public function deleteImage(Request $request) {
        $imgID = $request['imgID'];

        if(!ModelImage::where('id', $imgID)->exists()) {
            return response()->json(['success' => false, 'msg' => 'Image doesn\'t exist.']);
        }

        $image = ModelImage::where('id', $imgID)->get()[0];

        if($image->model_id != Auth::user()->id) {
            return response()->json(['success' => false, 'msg' => 'You are not the owner of that image.']);
        }

        try {
            $server = $image->getServer();


            if ($server == null) {
                throw new \Exception('Could not connect to image server.');
            }

            $ftpObj = $server->getFTPConnection();
            $ftpObj->changeDir('files/images');
            $ftpObj->deleteFile($image->file_name);

            $image->delete();
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
        return response()->json(['success' => true, 'msg' => 'Image deleted!']);
    }

}
