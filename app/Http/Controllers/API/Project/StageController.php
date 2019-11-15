<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Requests\Project\Stage\CreateStageRequest;
use App\Http\Requests\Project\Stage\StageRequest;
use App\Http\Requests\Project\Stage\UpdateStageRequest;
use App\Http\Resources\Project\ProjectStageResource;
use App\Http\Services\Project\ProjectStageService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * Class StageController
 * @package App\Http\Controllers\API\Project
 */
class StageController extends Controller
{

    /**
     * @var ProjectStageService
     */
    private $projectStageService;

    /**
     * StageController constructor.
     * @param ProjectStageService $projectStageService
     */
    public function __construct(ProjectStageService $projectStageService)
    {
        $this->projectStageService = $projectStageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectStageResource::collection($this->projectStageService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateStageRequest $createStageRequest
     * @return ProjectStageResource
     */
    public function store(CreateStageRequest $createStageRequest)
    {
        return new ProjectStageResource($this->projectStageService->create($createStageRequest->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param StageRequest $stageRequest
     * @param int $id
     * @return ProjectStageResource
     */
    public function show(StageRequest $stageRequest, $id)
    {
        return new ProjectStageResource($this->projectStageService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStageRequest $updateStageRequest
     * @param int $id
     * @return ProjectStageResource
     */
    public function update(UpdateStageRequest $updateStageRequest, $id)
    {
        return new ProjectStageResource($this->projectStageService->update($id, $updateStageRequest->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StageRequest $stageRequest
     * @param int $id
     * @return Response
     */
    public function destroy(StageRequest $stageRequest, $id)
    {
        $this->projectStageService->delete($id);
        return response()->json(['success']);
    }
}
