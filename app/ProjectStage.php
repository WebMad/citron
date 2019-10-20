<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class ProjectStage
 * @package App
 */
class ProjectStage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['description', 'position', 'project_id'];

    /**
     * @return HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }
}
