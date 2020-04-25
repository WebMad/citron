<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedType extends Model
{

    const TASK = 1;

    protected $fillable = ['name'];
    public $timestamps = false;
}
