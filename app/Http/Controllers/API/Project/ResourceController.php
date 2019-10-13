<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Requests\Project\Resource\CreateResourceRequest;
use App\Http\Requests\Project\Resource\ResourceRequest;
use App\Http\Requests\Project\Resource\UpdateResourceRequest;
use App\Http\Resources\Project\ProjectResourceResource;
use App\Http\Services\Project\ProjectResourceService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ResourceController extends Controller
{
    /**
     * @var ProjectResourceService
     */
    private $projectResourceService;

    public function __construct(ProjectResourceService $projectResourceService)
    {
        $this->projectResourceService = $projectResourceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectResourceResource::collection($this->projectResourceService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateResourceRequest $request
     * @return ProjectResourceResource
     */
    public function store(CreateResourceRequest $request)
    {
        $projectResource = $this->projectResourceService->create($request->all());
        return new ProjectResourceResource($projectResource);
    }

    /**
     * Display the specified resource.
     *
     * @param ResourceRequest $projectResourceRequest
     * @param int $id
     * @return ProjectResourceResource
     */
    public function show(ResourceRequest $projectResourceRequest, $id)
    {
        return new ProjectResourceResource($this->projectResourceService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateResourceRequest $updateResourceRequest
     * @param int $id
     * @return ProjectResourceResource
     */
    public function update(UpdateResourceRequest $updateResourceRequest, $id)
    {
        return new ProjectResourceResource($this->projectResourceService->update($id, $updateResourceRequest->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ResourceRequest $resourceRequest
     * @param ResourceRequest $id
     * @return Response
     */
    public function destroy(ResourceRequest $resourceRequest, $id)
    {
        $this->projectResourceService->delete($id);
        return response()->json(['success']);
    }
}
