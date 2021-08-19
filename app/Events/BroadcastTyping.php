<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BroadcastTyping implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender_id;
    public $receiver_id;
    public $is_typing;

    public function __construct($sender_id, $receiver_id, $is_typing)
    {
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->is_typing = $is_typing;
    }


    public function broadcastOn()
    {
        return ['Chat.Typing.' . $this->receiver_id];
    }
}
