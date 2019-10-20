<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\ProjectResource;

class ProjectResourceService extends BaseService
{

    public function __construct(ProjectResource $projectResource)
    {
        parent::__construct($projectResource);
    }

}
