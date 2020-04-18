<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\Project;
use App\ProjectResource;
use App\ProjectRole;
use App\ProjectStage;
use App\ProjectsUser;
use App\TaskStage;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class TaskStageService
 * @package App\Http\Services\Project
 */
class TaskStageService extends BaseService
{
    /**
     * TaskStageService constructor.
     * @param TaskStage $taskStage
     */
    public function __construct(TaskStage $taskStage)
    {
        parent::__construct($taskStage);
    }
}
