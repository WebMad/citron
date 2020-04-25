<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Project
 * @package App
 */
class Project extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'purpose',
        'expected_result',
        'start_date',
        'end_date',
        'expected_date',
        'creator_id',
    ];

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'projects_users', 'project_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function projectUsers()
    {
        return $this->hasMany('App\ProjectsUser', 'project_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function projectResources()
    {
        return $this->hasMany('App\ProjectResource', 'project_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function projectStages()
    {
        return $this->hasMany('App\ProjectStage', 'project_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function projectInvites()
    {
        return $this->hasMany('App\ProjectInvite', 'project_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task', 'project_id', 'id');
    }

}
