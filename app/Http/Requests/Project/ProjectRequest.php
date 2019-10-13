<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\BaseRequest;

class ProjectRequest extends BaseRequest
{

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('project');
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
            'id' => 'required|exists:projects,id'
        ];
    }
}
