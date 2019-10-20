<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectRole
 * @package App
 */
class ProjectRole extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    public const TUTOR = 1;
    public const MENTOR = 2;
    public const LEADER = 3;
    public const MEMBER = 4;

}
