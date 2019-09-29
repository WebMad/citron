<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectResource extends Model
{
    protected $fillable = ['name', 'position', 'project_id'];

    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }
}
