<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'name', 'middle_name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const ADMINISTRATOR = 1;
    public const MODERATOR = 2;
    public const USER = 3;

    /**
     * @return HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    /**
     * @return HasMany
     */
    public function invites()
    {
        return $this->hasMany('App\ProjectInvite', 'user_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany('App\Project', 'projects_users','user_id', 'project_id');
    }

    /**
     * @return BelongsToMany
     */
    public function confirmedProjects()
    {
        return $this->belongsToMany('App\Project', 'projects_users','user_id', 'project_id')->where('confirmed', '=', true);
    }

    /**
     * Проверяет, имеет ли пользователь права администратора
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role_id == self::ADMINISTRATOR;
    }

    /**
     * Проверяет, имеет ли пользователь права модератора
     * @return bool
     */
    public function isModer()
    {
        return $this->role_id == self::MODERATOR;
    }

}
