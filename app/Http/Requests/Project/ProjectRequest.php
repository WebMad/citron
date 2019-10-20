<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\BaseRequest;

/**
 * Class ProjectRequest
 * @package App\Http\Requests\Project
 */
class ProjectRequest extends BaseRequest
{

    /**
     * @param null $keys
     * @return array
     */
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
