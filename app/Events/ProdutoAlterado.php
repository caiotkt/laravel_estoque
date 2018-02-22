<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProdutoAlterado extends Event
{
    use SerializesModels;

    public $produto;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
