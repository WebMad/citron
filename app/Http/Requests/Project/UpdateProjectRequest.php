<?php

namespace App\Http\Requests\Project;

/**
 * Class UpdateProjectRequest
 * @package App\Http\Requests\Project
 */
class UpdateProjectRequest extends ProjectRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            'name' => 'required|string|max:255',
            'purpose' => '',
            'expected_result' => '',
            'start_date' => 'date_format:Y-m-d',
            'end_date' => 'date_format:Y-m-d',
            'expected_date' => 'date_format:Y-m-d',
            'project_role_id' => 'nullable|exists:project_roles,id',
            'user_id' => 'nullable|exists:users,id'
        ]);
    }
}
