<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\InviteStatus;
use App\ProjectInvite;

/**
 * Class ProjectInviteService
 * @package App\Http\Services\Project
 */
class ProjectInviteService extends BaseService
{

    public function __construct(ProjectInvite $projectInvite)
    {
        parent::__construct($projectInvite);
    }

    public function accept($id)
    {
        $invite = $this->find($id);
        $invite->status_id = InviteStatus::ACCEPTED;
        $invite->save();
    }

    public function deny($id)
    {
        $invite = $this->find($id);
        $invite->status_id = InviteStatus::DENIED;
        $invite->save();
    }
}
