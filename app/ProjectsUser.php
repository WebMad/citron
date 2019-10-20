<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static ProjectsUser create(array $array)
 */
class ProjectsUser extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'project_id', 'project_role_id', 'confirmed'
    ];

    /**
     * @return HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function projectRole()
    {
        return $this->hasOne('App\ProjectRole', 'id', 'project_role_id');
    }
}
