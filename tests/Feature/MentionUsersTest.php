<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Notifications\Notification;
use Tests\TestCase;

class MentionUsersTest extends TestCase
{

    use RefreshDatabase;

    function test_mentioned_users_in_a_reply_are_notified()
    {
        $john = create(User::class,['name'=> 'JohnDoe']);
        $jane = create(User::class,['name'=> 'JaneDoe']);

        $this->signIn($john);

        $thread = create(Thread::class);

        $reply = make(Reply::class,['body'=>'@JaneDoe look at this. Also @FrankDoe']);

        $this->postJson($thread->path().'/replies',$reply->toArray());


        $this->assertCount(1,$jane->notifications);

    }

}