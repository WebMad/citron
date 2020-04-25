<?php

namespace App\Http\Requests\Project\Task;

use App\Http\Requests\BaseRequest;

class CreateTaskRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => '',
            'implementer_id' => 'nullable|exists:users,id',
            'creator_id' => 'exists:users,id',
            'prospective_date' => 'date_format:Y-m-d',
            'status_id' => 'exists:task_statuses,id',
            'project_id' => 'exists:projects,id',
            'stage_id' => 'exists:task_stages,id'
        ];
    }
}
