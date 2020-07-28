<?php

namespace App\Events;


use Illuminate\Queue\SerializesModels;

/**
 * Class ThreadHasNewReply
 * @package App\Events
 */
class ThreadHasNewReply
{
    use SerializesModels;


    public $thread;
    public $reply;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($thread,$reply)
    {
        $this->thread = $thread;
        $this->reply = $reply;
    }
}
