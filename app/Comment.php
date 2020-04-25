<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'user_id', 'feed_id', 'reply_id', 'is_discussion', 'is_resolved'];

    public function reply_comment()
    {
        return $this->hasMany('App\Comment', 'reply_id', 'id');
    }

    public function comments_tree()
    {
        return $this->reply_comment()->with('comments_tree');
    }
}
