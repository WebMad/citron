<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['type_id'];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'feed_id', 'id');
    }

    public function comments_tree()
    {
        return $this->hasMany('App\Comment', 'feed_id', 'id')
            ->whereNull(['reply_id'])
            ->with(['comments_tree', 'user']);
    }
}
