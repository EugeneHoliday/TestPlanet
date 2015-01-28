<?php

class Comment extends \Eloquent {
	protected $fillable = [];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function likes()
    {
        return $this->morphMany('Like', 'likeable');
    }

    public function replies()
    {
        return $this->morphMany('Comment', 'commentable');
    }
}