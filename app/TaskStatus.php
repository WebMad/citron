<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    const OPENED = 1;
    const CLOSED = 2;
    const ARCHIVED = 3;

    protected $fillable = ['name'];
    public $timestamps = false;
}
