<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\ProjectStage;

/**
 * Class ProjectStageService
 * @package App\Http\Services\Project
 */
class ProjectStageService extends BaseService
{

    /**
     * ProjectStageService constructor.
     * @param ProjectStage $projectStage
     */
    public function __construct(ProjectStage $projectStage)
    {
        parent::__construct($projectStage);
    }

}
