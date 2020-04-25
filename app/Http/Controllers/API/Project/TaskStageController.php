<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Task\CreateTaskStageRequest;
use App\Http\Requests\Project\Task\TaskStageRequest;
use App\Http\Requests\Project\Task\UpdateTaskStageRequest;
use App\Http\Resources\Project\TaskStageResource;
use App\Http\Services\Project\TaskStageService;
use Illuminate\Http\Request;

class TaskStageController extends Controller
{

    private $taskStageService;

    public function __construct(TaskStageService $taskStageService)
    {
        $this->taskStageService = $taskStageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TaskStageResource::collection($this->taskStageService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTaskStageRequest $request
     * @return TaskStageResource
     */
    public function store(CreateTaskStageRequest $request)
    {
        return new TaskStageResource($this->taskStageService->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param TaskStageRequest $taskStageRequest
     * @param int $id
     * @return TaskStageResource
     */
    public function show(TaskStageRequest $taskStageRequest, $id)
    {
        return new TaskStageResource($this->taskStageService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskStageRequest $updateTaskStageRequest
     * @param int $id
     * @return TaskStageResource
     */
    public function update(UpdateTaskStageRequest $updateTaskStageRequest, $id)
    {
        return new TaskStageResource($this->taskStageService->update($id, $updateTaskStageRequest->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TaskStageRequest $taskStageRequest
     * @param int $id
     * @return string[]
     * @throws \Exception
     */
    public function destroy(TaskStageRequest $taskStageRequest, $id)
    {
        $this->taskStageService->delete($id);
        return ['success'];
    }
}
