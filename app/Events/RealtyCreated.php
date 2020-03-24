<?php

namespace App\Events;

use App\Http\Requests\StoreRealty;
use App\Realty;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RealtyCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $realty;
    public $request;

    /**
     * Create a new event instance.
     *
     * @param Realty $realty
     * @param StoreRealty $request
     */
    public function __construct(Realty $realty, StoreRealty $request)
    {
        $this->realty = $realty;
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
