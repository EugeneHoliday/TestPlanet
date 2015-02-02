<?php

class Like extends \Eloquent {

    const DEFAULTWEIGHT = 1;

	protected $fillable = ['value'];

    public function likeable()
    {
        return $this->morphTo();
    }

    public static function voteValue($sign, $value)
    {
        if($sign == "minus")
            return $value * -1;
        return $value;
    }

    public function save(array $options = array())
    {
        parent::save($options);

        Event::fire('like.save', $this);
    }
}