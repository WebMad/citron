<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\Project;
use App\ProjectResource;
use App\ProjectRole;
use App\ProjectStage;
use App\ProjectsUser;
use Illuminate\Support\Facades\Auth;

class ProjectStageService extends BaseService
{

    public function __construct(ProjectStage $projectStage)
    {
        parent::__construct($projectStage);
    }

}
