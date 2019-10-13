<?php

namespace App\Http\Requests\Project\Resource;

use App\Http\Requests\BaseRequest;

class ResourceRequest extends BaseRequest
{
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('project_resource');
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
            'id' => 'exists:project_resources,id'
        ];
    }
}
