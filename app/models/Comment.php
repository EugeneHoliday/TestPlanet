<?php

class Comment extends \Eloquent {
	protected $fillable = ['content', 'commentable_type', 'commentable_id'];

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

    public function delete()
    {
        $this->replies()->delete();

        return parent::delete();
    }
}