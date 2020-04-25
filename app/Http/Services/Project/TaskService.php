<?php

namespace App\Http\Services\Project;

use App\FeedType;
use App\Http\Services\BaseService;
use App\Http\Services\FeedService;
use App\Task;


/**
 * Class TaskService
 * @package App\Http\Services\Project
 */
class TaskService extends BaseService
{

    protected $feedService;

    /**
     * TaskService constructor.
     * @param Task $task
     * @param FeedService $feedService
     */
    public function __construct(Task $task, FeedService $feedService)
    {
        $this->feedService = $feedService;
        parent::__construct($task);
    }

    public function create($params)
    {
        $feed = $this->feedService->create([
            'type_id' => FeedType::TASK,
        ]);
        $params['feed_id'] = $feed->id;
        return parent::create($params);
    }
}
