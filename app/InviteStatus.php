<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InviteStatus extends Model
{

    const SENDED = 1;
    const ACCEPTED = 2;
    const DENIED = 3;

    protected $table = 'invite_statuses';
}
