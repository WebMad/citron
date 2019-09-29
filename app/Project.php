<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'purpose',
        'expected_result',
        'start_date',
        'end_date',
        'expected_date',
    ];

    public function projectUsers()
    {
        return $this->hasMany('App\ProjectsUser', 'project_id', 'id');
    }

    public function projectResources()
    {
        return $this->hasMany('App\ProjectResources', 'project_id', 'id');
    }

    public function projectStages()
    {
        return $this->hasMany('App\ProjectStage', 'project_id', 'id');
    }

}
