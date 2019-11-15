<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProjectResource
 * @package App\Http\Resources\Project
 */
class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'purpose' => $this->purpose,
            'expected_result' => $this->expected_result,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'expected_date' => $this->expected_date,
        ];
    }
}
