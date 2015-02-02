<?php

use \Illuminate\Database\Eloquent\Collection;

class Comment extends \Eloquent
{

    protected $attributes = array(
        'rating' => '0'
    );

    public $parents = ['Post'];

    protected $with = ['replies'];

    protected $fillable = ['content', 'commentable_type', 'commentable_id', 'parent_id'];

    public function likes()
    {
        return $this->morphMany('Like', 'likeable');
    }

    public function delete()
    {
        $this->likes()->delete();
        return parent::delete();
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parentComment()
    {
        return $this->belongsTo('Comment', 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany('Comment', 'parent_id', 'id');
    }

}