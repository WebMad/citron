<?php

namespace App\Http\Resources;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property string updated_at
 * @property string created_at
 * @property Role role
 * @property string middle_name
 * @property string surname
 */
class UserResource extends JsonResource
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
            'surname' => $this->surname,
            'name' => $this->name,
            'middle_name' => $this->middle_name,
            'email' => $this->email,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'role' => new RoleResource($this->role)
        ];
    }
}
