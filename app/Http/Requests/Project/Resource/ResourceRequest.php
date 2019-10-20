<?php

namespace App\Http\Requests\Project\Resource;

use App\Http\Requests\BaseRequest;

/**
 * Class ResourceRequest
 * @package App\Http\Requests\Project\Resource
 */
class ResourceRequest extends BaseRequest
{
    /**
     * @param null $keys
     * @return array
     */
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
