<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    use Favorable, RecordsActivity;

    protected $fillable = ['thread_id', 'user_id', 'body'];

    protected $with = ['owner', 'favorites'];

    protected $appends = [ 'favoritesCount','isFavorited'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function path()
    {
        return $this->thread->path()."/#reply-{$this->id}";
    }

}
