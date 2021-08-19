<?php

namespace App\Events;

use App\ModelImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Message;

class BroadcastPurchasedCredits implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $success;
    public $balance;
    public $receiver_id;

    public function __construct($message, $success, $balance, $receiver_id)
    {
        $this->message = $message;
        $this->success = $success;
        $this->balance = $balance;
        $this->receiver_id = $receiver_id;
    }


    public function broadcastOn()
    {
        return ['Credits.Purchased.' . $this->receiver_id];
    }
}
