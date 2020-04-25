<?php

namespace App\Http\Requests\Project\Task;

use App\Http\Requests\BaseRequest;

class UpdateTaskStageRequest extends TaskStageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'name' => 'required|max:255',
            'position' => 'nullable|integer',
            'project_id' => 'exists:projects,id',
        ]);
    }
}
