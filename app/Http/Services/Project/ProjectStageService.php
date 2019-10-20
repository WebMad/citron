<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\ProjectStage;

class ProjectStageService extends BaseService
{

    public function __construct(ProjectStage $projectStage)
    {
        parent::__construct($projectStage);
    }

}
