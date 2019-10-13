<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectRole extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public const TUTOR = 1;
    public const MENTOR = 2;
    public const LEADER = 3;
    public const MEMBER = 4;

}
