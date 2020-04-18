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
     * @var ProjectUserService
     */
    private $projectUserService;

    /**
     * ProjectInviteService constructor.
     * @param ProjectInvite $projectInvite
     */
    public function __construct(ProjectInvite $projectInvite, ProjectUserService $projectUserService)
    {
        parent::__construct($projectInvite);
        $this->projectUserService = $projectUserService;
    }

    /**
     * @param $id
     */
    public function accept($id)
    {
        $invite = $this->find($id);
        $invite->status_id = InviteStatus::ACCEPTED;
        $invite->save();

        $project_user = $this->projectUserService->all([], [
            ['project_id', '=', $invite->project_id],
            ['user_id', '=', $invite->user_id],
        ])[0];
        $project_user->confirmed = true;
        $project_user->save();
    }

    /**
     * @param $id
     */
    public function deny($id)
    {
        $invite = $this->find($id);
        $invite->status_id = InviteStatus::DENIED;
        $invite->save();

        $this->projectUserService->all([], [
            ['project_id', '=', $invite->project_id],
            ['user_id', '=', $invite->user_id],
        ])[0]->delete();
    }
}
