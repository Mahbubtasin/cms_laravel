<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = [
        'comment_id', 'is_active', 'email', 'author', 'body', 'photo'
    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
