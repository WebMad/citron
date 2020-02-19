<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectsUserResource;
use App\Http\Services\Project\ProjectUserService;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{

    /**
     * @var ProjectUserService
     */
    private $projectUserService;

    public function __construct(ProjectUserService $projectUserService)
    {
        $this->projectUserService = $projectUserService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectsUserResource::collection($this->projectUserService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ProjectsUserResource
     */
    public function store(Request $request)
    {
        return new ProjectsUserResource($this->projectUserService->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProjectsUserResource
     */
    public function show($id)
    {
        return new ProjectsUserResource($this->projectUserService->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ProjectsUserResource
     */
    public function update(Request $request, $id)
    {
        return new ProjectsUserResource($this->projectUserService->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->projectUserService->delete($id);
        return response()->json(['success']);
    }
}
