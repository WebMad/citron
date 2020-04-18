<?php

namespace App\Http\Resources;

use App\Http\Resources\Project\ProjectResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProjectInviteResource
 * @package App\Http\Resources
 */
class ProjectInviteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'project' => new ProjectResource($this->project),
            'status_id' => $this->status_id
        ];
    }
}
