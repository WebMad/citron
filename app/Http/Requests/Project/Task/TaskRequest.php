<?php

namespace App\Http\Requests\Project\Task;

use App\Http\Requests\BaseRequest;

class TaskRequest extends BaseRequest
{
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('project_task');
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
            'id' => 'required|exists:tasks,id'
        ];
    }
}
