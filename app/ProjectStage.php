<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
    protected $fillable = ['description', 'position', 'project_id'];

    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }
}
