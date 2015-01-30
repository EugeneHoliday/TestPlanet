<?php

class Post extends \Eloquent {
	protected $fillable = ['title', 'description'];

    protected $with = ['comments', 'likes'];

    public function countLikes(){

    }
    
    public function comments()
    {
        return $this->morphMany('Comment', 'commentable');
    }

    public function rootComments()
    {
        return $this->morphMany('Comment', 'commentable')->where('parent_id', 0);
    }

    public function likes()
    {
        return $this->morphMany('Like', 'likeable');
    }

    public function delete()
    {
        $this->comments()->delete();
        
        return parent::delete();
    }

    public function getRatingAttribute()
    {
        return $this->likes()->sum('value');
    }

    public function getCommentsRatingAttribute()
    {

    }
}