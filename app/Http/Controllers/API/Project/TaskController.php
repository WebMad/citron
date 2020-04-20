<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Task\CreateTaskRequest;
use App\Http\Requests\Project\Task\TaskRequest;
use App\Http\Requests\Project\Task\UpdateTaskRequest;
use App\Http\Resources\Project\TaskResource;
use App\Http\Services\Project\TaskService;
use App\Task;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TaskResource::collection($this->taskService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TaskResource
     */
    public function store(CreateTaskRequest $request)
    {
        return new TaskResource($this->taskService->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param TaskRequest $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function show(TaskRequest $request, $id)
    {
        return Task::with(['status', 'creator', 'implementer', 'stage'])->where('id', '=', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskRequest $request
     * @param int $id
     * @return TaskResource
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        return new TaskResource($this->taskService->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TaskRequest $request
     * @param int $id
     * @return string[]
     * @throws \Exception
     */
    public function destroy(TaskRequest $request, $id)
    {
        $this->taskService->delete($id);
        return ['success'];
    }
}
