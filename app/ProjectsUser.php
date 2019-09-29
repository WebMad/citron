<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsUser extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'project_role_id'
    ];

    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function projectRole()
    {
        return $this->hasOne('App\ProjectRole', 'id', 'project_role_id');
    }
}
