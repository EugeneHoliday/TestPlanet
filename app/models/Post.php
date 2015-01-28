<?php

class Post extends \Eloquent {
	protected $fillable = ['title', 'description'];

    public function comments()
    {
        return $this->morphMany('Comment', 'commentable');
    }

    public function likes()
    {
        return $this->morphMany('Like', 'likeable');
    }
}