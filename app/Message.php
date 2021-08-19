<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $fillable = ['sender_id', 'receiver_id', 'message', 'read', 'img_id', 'tip'];

    public function getSenderName() {
        return User::where('id', $this->sender_id)->get()[0]->name;
    }

    public function getReceiverName() {
        return User::where('id', $this->receiver_id)->get()[0]->name;
    }

    public function getTimeStamp() {
        return date('h:i A', strtotime($this->created_at));
    }

    public function getDateStamp() {
        return date('m/d/Y', strtotime($this->created_at));
    }

    public function getDayPosted() {
        $unixTimestamp = strtotime($this->created_at);
        $dayOfWeek = date("l", $unixTimestamp);
        return $dayOfWeek;
    }

    public function getPreviewDateStamp() {
        $dateObj = DateTime::createFromFormat('!m', date('m', strtotime($this->created_at)));
        $monthName = $dateObj->format('F'); // March
        return substr($this->getDayPosted(), 0, 3) . ', ' . $monthName . ' ' . date('d', strtotime($this->created_at)) . ', ' . $this->getTimeStamp();
    }

    public static function getUnreadMessages($sender_id, $receiver_id) {
        return Message::where('sender_id', $sender_id)->where('receiver_id', $receiver_id)->where('read', false)->get();
    }

    public static function getAllUnreadMessages($receiver_id) {
        return Message::where('receiver_id', $receiver_id)->where('read', false)->get();
    }

}
