<?php

namespace App\Http\Requests\Project\Task;

class UpdateTaskRequest extends TaskRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'name' => 'nullable|max:255',
            'description' => '',
            'implementer_id' => 'nullable|exists:users,id',
            'creator_id' => 'nullable|exists:users,id',
            'prospective_date' => 'nullable|date_format:Y-m-d',
            'status_id' => 'nullable|exists:task_statuses,id',
            'project_id' => 'nullable|exists:projects,id',
            'stage_id' => 'nullable|exists:task_stages,id'
        ]);
    }
}
