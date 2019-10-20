<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectInvite extends Model
{
    protected $fillable = ['user_id', 'project_id', 'status_id'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    public function status()
    {
        return $this->hasOne('App\InviteStatus', 'id', 'status_id');
    }
}
