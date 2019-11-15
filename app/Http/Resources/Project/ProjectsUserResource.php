<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\UserResource;
use App\ProjectRole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @method User user()
 * @method ProjectRole projectRole()
 */
class ProjectsUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => new UserResource($this->user()->first()),
            'project_role' => new ProjectRoleResource($this->projectRole()->first()),
        ];
    }
}
