<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Requests\Project\ProjectRoleRequest;
use App\Http\Resources\Project\ProjectRoleResource;
use App\ProjectRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class RoleController
 * @package App\Http\Controllers\API\Project
 */
class RoleController extends Controller
{
    /**
     * @param ProjectRole $projectRole
     * @return AnonymousResourceCollection
     */
    public function index(ProjectRole $projectRole)
    {
        return ProjectRoleResource::collection($projectRole::all());
    }

    /**
     * @param ProjectRole $projectRole
     * @param ProjectRoleRequest $projectRoleRequest
     * @param $id
     * @return ProjectRoleResource
     */
    public function show(ProjectRole $projectRole, ProjectRoleRequest $projectRoleRequest, $id)
    {
        return new ProjectRoleResource($projectRole::find($id));
    }
}
