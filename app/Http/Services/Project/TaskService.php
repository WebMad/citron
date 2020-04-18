<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\Task;


/**
 * Class TaskService
 * @package App\Http\Services\Project
 */
class TaskService extends BaseService
{

    /**
     * TaskService constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }
}
