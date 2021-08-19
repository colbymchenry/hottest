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
use App\PayPal\CheckoutCredits;
use App\RemoteDataServer;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function getChatsView() {
        $messages = Message::orderBy('created_at', 'DESC')->where('receiver_id', Auth::user()->id)->orWhere('sender_id', Auth::user()->id)->get();
        $conversations = array();

        foreach ($messages as $message) {
            if (Auth::user()->id == $message['receiver_id']) {
                if (!key_exists($message['sender_id'], $conversations)) {
                    $conversations[$message['sender_id']] = $message;
                }
            } else if (Auth::user()->id == $message['sender_id']) {
                if (!key_exists($message['receiver_id'], $conversations)) {
                    $conversations[$message['receiver_id']] = $message;
                }
            }
        }

        Log::info($messages);

        return view('chat')->with('conversations', $conversations);
    }

    public function getChat($id) {
        if($id == 'service-worker.js') return null;
        $messages = Message::orderBy('created_at', 'DESC')->where(['receiver_id' => $id, 'sender_id' => Auth::user()->id])->orWhere(['receiver_id' => Auth::user()->id, 'sender_id' => $id])->take(10)->get()->reverse();
        if (!Message::where(['receiver_id' => $id, 'sender_id' => Auth::user()->id])->orWhere(['receiver_id' => Auth::user()->id, 'sender_id' => $id])->exists()) {
            AlertHelper::alertWarning('You do not have a chat started with that person.');
            return redirect('/chat');
        }

        Message::where('receiver_id', Auth::user()->id)
            ->where('sender_id', $id)
            ->update(['read' => true]);

        $price = 0;
        $participant = User::where('id', $id)->get()[0];

        if($participant->is_model) {
            $model = (new Model($id));
            if($model->getPricing(ProductType::$MESSAGE) !== null) {
                $price = $model->getPricing(ProductType::$MESSAGE)->price;
            }
        }


        /**
         * messages: This variables holds all the messages from the database in the correct ascending order
         * participant: This is the other person in the chat, not the client
         * timestamp: We need this variable to add appropriate timestamps on the messages, so it's not over cluttered
         */
        return view('chat-open')->with('messages', $messages)->with('participant', $participant)->with('price', $price)->with('timestamp', $messages[0]->getTimeStamp());
    }

    public function getMessages($id, $page) {
        $messages = Message::orderBy('created_at', 'DESC')->where(['receiver_id' => $id, 'sender_id' => Auth::user()->id])->orWhere(['receiver_id' => Auth::user()->id, 'sender_id' => $id])->skip(10 * $page)->take(10)->get()->reverse();
        $messageArray = array();

        foreach ($messages as $message) {
            $data = $message->toArray();
            $data['timestamp'] = $message->getTimeStamp();
            $data['datestamp'] = $message->created_at;
            array_push($messageArray, $data);
        }
        return response()->json(['messages' => $messageArray]);
    }

    public function sendMessage(Request $request) {
        try {
            Log::info($request);
            $participant = User::where('id', $request['receiver'])->get()[0];
            $user = User::where('id', Auth::user()->id)->get()[0];
            $model = null;
            $price = null;
            if($participant->is_model) {
                $model = new Model($participant->id);
                $price = $model->getPricing(ProductType::$MESSAGE)->price;
                if(Auth::user()->credits < $price) {
                    return response()->json(['success' => false, 'msg' => 'Not enough credits.']);
                }
            }

            if(empty(trim($request['message']))) return null;

            $message = new Message();
            $message->sender_id = Auth::user()->id;
            $message->receiver_id = $request['receiver'];
            $message->message = $request['message'];
            $message->read = false;
            $message->save();
            if($participant->is_model) {
                $user->credits = $user->credits - $price;
                $user->save();
                $participant->credits = $participant->credits + $price;
                $participant->save();
            }
            event(new BroadcastChat($message));
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
        $timestamp = $message->getTimeStamp();
        $msg = $message->message;
        return response()->json(['success' => true, 'url' => '/chat/open/' . $request['receiver'], 'timestamp' => $timestamp, 'created_at' => $message->toArray()['created_at'], 'message' => $msg, 'credits' => $user->credits]);
    }

    public function sendImage(Request $request) {
        $imageUpload = $this->uploadImage($request['file']);

        if(!$imageUpload['success']) {
            return response()->json(['success' => false, 'msg' => $imageUpload['msg']]);
        }

        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request['receiver'];
        $message->message = '';
        $message->img_id = $imageUpload['id'];
        $message->read = false;
        $message->save();
        event(new BroadcastChat($message));

        $image = ModelImage::where('id', $imageUpload['id'])->get()[0];
        $timestamp = $message->getTimeStamp();
        return response()->json(['success' => true, 'img-url' => $image->getLink(), 'img-id' => $image->id, 'img-height' => $image->height, 'img-width' => $image->width, 'timestamp' => $timestamp, 'created_at' => $message->toArray()['created_at']]);
    }

    public function sendTip(Request $request) {
        $receiver = $request['receiver'];
        $amount = $request['amount'];

        if(!User::where('id', $receiver)->exists()) return response()->json(['success' => false, 'msg' => 'User not found by that ID.']);

        $userReciever = User::where('id', $receiver)->get()[0];

        if(Auth::user()->credits < $amount) return response()->json(['success' => false, 'msg' => 'Insufficient credits.']);

        $userReciever->credits = $userReciever->credits + $amount;
        $userReciever->save();
        $userSender = User::where('id', Auth::user()->id)->get()[0];
        $userReciever->credits = $userSender->credits - $amount;

        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request['receiver'];
        $message->message = '';
        $message->read = false;
        $message->tip = intval($amount);
        $message->save();

        return response()->json(['success' => true]);
    }

    public function sendTyping(Request $request) {
        event(new BroadcastTyping(Auth::user()->id, $request['receiver'], $request['typing']));
    }

    public function createBuyCredits($amount) {
        try {
            Log::info($amount);
            $checkout = new CheckoutCredits((int) $amount);
            $checkout->createCheckout();
            return response()->json(['url' => $checkout->payment->getApprovalLink()]);
        } catch (Exception $e) {
            Log::error($e);
            Log::error($e->getData());
            AlertHelper::alertDanger($e->getMessage());
        }

        return null;
    }

    public function executeBuyCredits() {
        return CheckoutCredits::executeCheckout();
    }

    public function uploadImage(UploadedFile $file) {
        // TODO: Get validation working
//        try {
//            $this->validate($file, ['user_photo' => 'mimes:png,jpeg,jpg,gif | max:2048',]);
//        } catch (ValidationException $e) {
//            return ['success' => false, 'msg' => $e->getMessage()];
//        }

        $photoID = uniqid(Auth::user()->id);
        $photoName = $photoID . '.' . $file->getClientOriginalExtension();

        $imageInfo = getimagesize($file);
        list($width, $height) = $imageInfo;
        ImageHelper::compress($file, public_path('pending_uploads') . '/' . $photoName, 90);

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
            $modelImage->for_message = true;
            $modelImage->save();
        } catch (\Exception $e) {
            Log::error($e);
            return ['success' => false, 'msg' => $e->getMessage()];
        }

        return ['success' => true, 'id' => $modelImage->id];
    }

}
