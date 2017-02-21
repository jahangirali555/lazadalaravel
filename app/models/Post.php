<?php

class Post extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var array
     */
    protected $fillable = array('title');

  
    /**
     * Defines a many-to-many relationship.
     */
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }




}