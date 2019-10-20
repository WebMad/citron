<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\ProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\ProjectFullInfoResource;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\ProjectResourceResource;
use App\Http\Resources\Project\ProjectStageResource;
use App\Http\Resources\Project\ProjectsUserResource;
use App\Http\Resources\ProjectInviteResource;
use App\Http\Services\Project\ProjectService;
use App\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProjectController extends Controller
{

    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectResource::collection($this->projectService->all());
    }

    /**
     * Возвращает полную информацию о проекте (пользователи, ресурсы, этапы)
     *
     * @param ProjectRequest $projectRequest
     * @param $id
     * @return ProjectFullInfoResource
     */
    public function getFullInfo(ProjectRequest $projectRequest, $id)
    {
        return new ProjectFullInfoResource($this->projectService->find($id));
    }

    /**
     * Возвращает этапы проекта
     *
     * @param ProjectRequest $projectRequest
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function getStages(ProjectRequest $projectRequest, $id)
    {
        return ProjectStageResource::collection($this->projectService->getStages($id));
    }

    /**
     * Возвращает ресурсы проекта
     *
     * @param ProjectRequest $projectRequest
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function getResources(ProjectRequest $projectRequest, $id)
    {
        return ProjectResourceResource::collection($this->projectService->getResources($id));
    }

    /**
     * Возвращает всех участников проекта
     *
     * @param ProjectRequest $projectRequest
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function getUsers(ProjectRequest $projectRequest, $id)
    {
        return ProjectsUserResource::collection($this->projectService->getUsers($id));
    }

    public function getInvites(ProjectRequest $projectRequest, $id)
    {
        return ProjectInviteResource::collection($this->projectService->getInvites($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProjectRequest $request
     * @return ProjectResource
     */
    public function store(CreateProjectRequest $request)
    {
        /** @var Project $project */
        $project = $this->projectService->create($request->all());

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param ProjectRequest $projectRequest
     * @param int $id
     * @return ProjectResource
     */
    public function show(ProjectRequest $projectRequest, $id)
    {
        return new ProjectResource($this->projectService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectRequest $updateProjectRequest
     * @param int $id
     * @return ProjectResource
     */
    public function update(UpdateProjectRequest $updateProjectRequest, $id)
    {
        /** @var Project $project */
        return new ProjectResource($this->projectService->update($id, $updateProjectRequest->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProjectRequest $projectRequest
     * @param int $id
     * @return Response
     */
    public function destroy(ProjectRequest $projectRequest, $id)
    {
        $this->projectService->delete($id);

        return response()->json(['success']);
    }
}
