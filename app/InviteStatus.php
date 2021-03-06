<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InviteStatus
 * @package App
 */
class InviteStatus extends Model
{

    const SENDED = 1;
    const ACCEPTED = 2;
    const DENIED = 3;

    protected $fillable = ['project_id', 'user_id', 'status_id'];

    /**
     * @var string
     */
    protected $table = 'invite_statuses';
}
