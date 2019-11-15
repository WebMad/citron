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

    /**
     * ProjectInviteService constructor.
     * @param ProjectInvite $projectInvite
     */
    public function __construct(ProjectInvite $projectInvite)
    {
        parent::__construct($projectInvite);
    }

    /**
     * @param $id
     */
    public function accept($id)
    {
        $invite = $this->find($id);
        $invite->status_id = InviteStatus::ACCEPTED;
        $invite->save();
    }

    /**
     * @param $id
     */
    public function deny($id)
    {
        $invite = $this->find($id);
        $invite->status_id = InviteStatus::DENIED;
        $invite->save();
    }
}
