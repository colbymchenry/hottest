<?php

namespace App\Events;

use App\ModelImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Message;

class BroadcastChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $senderName;
    public $receiverName;
    public $timestamp;
    public $imgURL;
    public $img;

    public function __construct(Message $message)
    {
        $this->message = $message;
        $this->senderName = $message->getSenderName();
        $this->receiverName = $message->getReceiverName();
        $this->timestamp = $message->getTimeStamp();
        if($message->img_id !== null) {
            $image = ModelImage::where('id', $message->img_id)->get()[0];
            $this->imgURL = $image->getLink();
            $this->img = $image;
        }
    }


    public function broadcastOn()
    {
        return ['Chat.' . $this->message->receiver_id];
    }
}
