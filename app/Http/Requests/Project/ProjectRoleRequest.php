<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\BaseRequest;

/**
 * Class ProjectRoleRequest
 * @package App\Http\Requests\Project
 */
class ProjectRoleRequest extends BaseRequest
{
    /**
     * @param null $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('id');
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:project_roles,id'
        ];
    }
}
