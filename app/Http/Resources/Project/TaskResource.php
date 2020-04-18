<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'description' => $this->description,
            'implementer_id' => $this->implementer_id,
            'creator_id' => $this->creator_id,
            'prospective_date' => $this->prospective_date,
            'status_id' => $this->status_id,
            'project_id' => $this->project_id,
            'stage_id' => $this->stage_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
