<?php

namespace App\Http\Requests\Project\Task;

use App\Http\Requests\BaseRequest;

class TaskStageRequest extends BaseRequest
{
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('project_task_stage');
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
            'id' => 'required|exists:task_stages,id'
        ];
    }
}
