<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class ProjectResource
 * @package App
 */
class ProjectResource extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'position', 'project_id'];

    /**
     * @return HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }
}
