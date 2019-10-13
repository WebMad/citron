<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\BaseRequest;

class CreateProjectRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'purpose' => 'string',
            'expected_result' => 'string',
            'start_date' => 'date_format',
            'end_date' => 'date_format',
            'expected_date' => 'date_format',
            'project_role_id' => 'exists:project_roles,id',
            'user_id' => 'exists:users,id'
        ];
    }
}
