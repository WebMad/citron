<?php

namespace App\Http\Services\Project;

use App\Http\Services\BaseService;
use App\Project;
use App\ProjectResource;
use App\ProjectRole;
use App\ProjectStage;
use App\ProjectsUser;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProjectService
 * @package App\Http\Services\Project
 */
class ProjectService extends BaseService
{
    /**
     * @var ProjectsUser
     */
    private $projectsUser;

    public function __construct(Project $project, ProjectsUser $projectsUser)
    {
        parent::__construct($project);
        $this->projectsUser = $projectsUser;
    }

    /**
     * @param array $params
     * @return Project
     */
    public function create($params)
    {
        $project = $this->model::create($params);

        if (!isset($params['user_id'])) {
            $params['user_id'] = Auth::user()->id;
        }

        if (!isset($params['project_role_id'])) {
            $params['project_role_id'] = ProjectRole::TUTOR;
        }

        if (!isset($params['confirmed'])) {
            $params['confirmed'] = true;
        }

        /** @var ProjectsUser $projectsUser */
        $this->projectsUser::create([
            'user_id' => $params['user_id'],
            'project_id' => $project->id,
            'project_role_id' => $params['project_role_id'],
            'confirmed' => $params['confirmed'],
        ]);

        return $project;
    }

    /**
     * Возвращает всех пользователей проекта
     *
     * @param $id
     * @return User[]
     */
    public function getUsers($id) //TODO: переименовать этот метод в getProjectUsers и добавить метод getUsers, возвращающий чисто пользователей
    {
        return $this->find($id)->projectUsers()->get();
    }

    /**
     * Возвращает ресурсы проекта
     *
     * @param $id
     * @return ProjectResource[]
     */
    public function getResources($id)
    {
        return $this->find($id)->projectResources()->orderBy('position')->get();
    }

    /**
     * Возвращает этапы выполнения проекта
     *
     * @param $id
     * @return ProjectStage[]
     */
    public function getStages($id)
    {
        return $this->find($id)->projectStages()->orderBy('position')->get();
    }

    public function getInvites($id)
    {
        return $this->find($id)->projectInvites()->get();
    }

}
