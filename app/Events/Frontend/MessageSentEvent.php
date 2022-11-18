<?php

namespace App\Events\Frontend;

use App\Models\ChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $message;
    public $chat_channel;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    //public function __construct(ChatMessage $message, $chat_channel)
    public function __construct($message, $chat_channel)
    {
        $this->message = $message;
        $this->chat_channel = $chat_channel;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat');
        //return new PrivateChannel('chat');
        //return new PresenceChannel('demo');
    }

    public function broadcastAs()
    {
        return 'message';
    }

    // public function broadcastWith()
    // {
    //     return $this->message->toArray();
    // }
}
