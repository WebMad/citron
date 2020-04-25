<?php

namespace App\Http\Requests\Project\Task;

use App\Http\Requests\BaseRequest;

class CreateTaskStageRequest extends BaseRequest
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
            'position' => 'nullable|integer',
            'project_id' => 'exists:projects,id',
        ];
    }
}
