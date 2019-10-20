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

    public function users()
    {
        return $this->belongsToMany('App\User', 'projects_users', 'project_id', 'user_id');
    }

    public function projectUsers()
    {
        return $this->hasMany('App\ProjectsUser', 'project_id', 'id');
    }

    public function projectResources()
    {
        return $this->hasMany('App\ProjectResource', 'project_id', 'id');
    }

    public function projectStages()
    {
        return $this->hasMany('App\ProjectStage', 'project_id', 'id');
    }

    public function projectInvites()
    {
        return $this->hasMany('App\ProjectInvite', 'project_id', 'id');
    }

}
