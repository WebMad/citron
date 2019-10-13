<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\Project;
use App\ProjectResource;
use App\ProjectRole;
use App\ProjectStage;
use App\ProjectsUser;
use Illuminate\Support\Facades\Auth;

class ProjectResourceService extends BaseService
{

    public function __construct(ProjectResource $projectResource)
    {
        parent::__construct($projectResource);
    }

}
