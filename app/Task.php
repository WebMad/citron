<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'implementer_id', 'creator_id', 'prospective_date', 'status_id', 'project_id', 'stage_id'];

    public function status()
    {
        return $this->hasOne('App\TaskStatus', 'id', 'status_id');
    }

    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'creator_id');
    }

    public function implementer()
    {
        return $this->hasOne('App\User', 'id', 'implementer_id');
    }
}
