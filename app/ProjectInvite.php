<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class ProjectInvite
 * @package App
 */
class ProjectInvite extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'project_id', 'status_id'];

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
    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    /**
     * @return HasOne
     */
    public function status()
    {
        return $this->hasOne('App\InviteStatus', 'id', 'status_id');
    }
}
