<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProjectResourceResource
 * @package App\Http\Resources\Project
 */
class ProjectResourceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'project_id' => $this->project_id,
            'position' => $this->position
        ];
    }
}
