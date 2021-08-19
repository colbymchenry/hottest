<?php

namespace App\Http\Controllers;

use App\Http\AlertHelper;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {

    public function reply(Request $request) {
        $model_id = $request['model_id'];
        $message = $request['message'];

        if(!User::where('id', $model_id)->exists()) {
            AlertHelper::alertWarning('Model not found.');
            return redirect('/home');
        }

        $modelUser = User::where('id', $model_id)->get()[0];

        if(!$modelUser->is_model) {
            AlertHelper::alertWarning('That user is not a model.');
            return redirect('/home');
        }

        $messageModel = new Message();
        $messageModel->sender_id = Auth::user()->id;
        $messageModel->receiver_id = $model_id;
        $messageModel->message = $message;
        $messageModel->save();
    }

    public function getChat(Request $request) {
        $messages = $this->getMessages($request['user_id']);

        if(empty($messages)) {
            AlertHelper::alertWarning('There is no messages between you and that user.');
            return redirect('/home');
        }

        if(!User::where('id', $request['user_id'])->exists()) {
            AlertHelper::alertWarning('User does not exist.');
            return redirect('/home');
        }

        return response()->json($messages);
    }

    public function getMessages($user_id) {
        return Message::orderBy('CREATED_AT', 'desc')->where(['sender_id' => Auth::user()->id, 'receiver_id' => $user_id])->orWhere(['sender_id' => $user_id, 'receiver_id' => Auth::user()->id])->get();
    }

    public function getDiscussionsView() {
        $messages = Message::orderBy('CREATED_AT', 'desc')->where('sender_id', Auth::user()->id)->orWhere('receiver_id', Auth::user()->id)->get();
        $conversations = array();
        foreach($messages as $message) {
            $other_user_id = $message->sender_id == Auth::user()->id ? $message->receiver_id : $message->sender_id;
            if(!array_key_exists($conversations, $other_user_id)) {
                $conversations[$other_user_id] = $message;
            }
        }

        return view('chat')->with('conversations', $conversations);
    }

}