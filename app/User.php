<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
