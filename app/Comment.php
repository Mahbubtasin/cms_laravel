<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id', 'is_active', 'author', 'email', 'body', 'photo'
    ];

    public function reply()
    {
        return $this->hasMany('App\Reply');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
