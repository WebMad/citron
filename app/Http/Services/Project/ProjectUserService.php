<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\ProjectsUser;


/**
 * Class ProjectUserService
 * @package App\Http\Services\Project
 */
class ProjectUserService extends BaseService
{

    /**
     * ProjectUserService constructor.
     * @param ProjectsUser $projectsUser
     */
    public function __construct(ProjectsUser $projectsUser)
    {
        parent::__construct($projectsUser);
    }

}
