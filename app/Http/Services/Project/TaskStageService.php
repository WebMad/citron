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

    public function create($params)
    {
        if (empty($params['position'])) {
            $position = $this->model::where('project_id', '=', $params['project_id'])
                ->orderBy('position', 'desc')
                ->pluck('position')
                ->first();
            $params['position'] = !empty($position) ? $position + 1 : 1;
        }
        $this->sortByPosition($params['position'], $params['project_id']);
        return parent::create($params);
    }

    public function update($id, $params)
    {
        if (!empty($params['position'])) {
            $project_id = $this->find($id)->project_id;
            $this->sortByPosition($params['position'], $project_id, $id);
        }
        return parent::update($id, $params);
    }

    public function sortByPosition($position, $project_id, $task_stage_id = null)
    {
        $task_stages = $this->model::where('project_id', '=', $project_id)
            ->where('id', '<>', $task_stage_id)
            ->orderBy('position', 'asc')->get();
        $pos_i = 1;
        foreach ($task_stages as $task_stage) {
            if ($pos_i == $position)
                $pos_i++;
            $task_stage->position = $pos_i;
            $task_stage->save();
            $pos_i++;
        }
    }
}
