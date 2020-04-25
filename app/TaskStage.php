<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStage extends Model
{
    protected $fillable = ['name', 'position', 'project_id'];

    public function tasks()
    {
        return $this->hasMany('App\Task', 'stage_id', 'id');
    }
}
