<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\ProjectResource;

/**
 * Class ProjectResourceService
 * @package App\Http\Services\Project
 */
class ProjectResourceService extends BaseService
{

    /**
     * ProjectResourceService constructor.
     * @param ProjectResource $projectResource
     */
    public function __construct(ProjectResource $projectResource)
    {
        parent::__construct($projectResource);
    }

}
