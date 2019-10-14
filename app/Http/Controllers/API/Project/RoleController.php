<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Requests\Project\ProjectRoleRequest;
use App\Http\Resources\Project\ProjectRoleResource;
use App\ProjectRole;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(ProjectRole $projectRole)
    {
        return ProjectRoleResource::collection($projectRole::all());
    }

    public function show(ProjectRole $projectRole, ProjectRoleRequest $projectRoleRequest, $id)
    {
        return new ProjectRoleResource($projectRole::find($id));
    }
}
