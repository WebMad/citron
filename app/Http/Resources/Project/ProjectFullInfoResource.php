<?php

namespace App\Http\Resources\Project;

/**
 * Class ProjectFullInfoResource
 * @package App\Http\Resources\Project
 */
class ProjectFullInfoResource extends ProjectResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->mergeData([
            'project' => parent::toArray($request)
        ], 1, [
            'users' => ProjectsUserResource::collection($this->projectUsers()->get()),
            'resources' => ProjectResourceResource::collection($this->projectResources()->orderBy('position')->get()),
            'stages' => ProjectStageResource::collection($this->projectStages()->orderBy('position')->get()),
        ], 2);
    }
}
