<?php


namespace App;


trait Favorable
{
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorable');
    }

    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];

        if(!$this->favorites()->where($attributes)->exists())
        {
            $this->favorites()->create($attributes);
        }
    }

    public function isFavorited() : bool
    {
        return $this->favorites->where('user_id',auth()->id())->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
