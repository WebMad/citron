<?php

namespace App\Http\Requests\Project\Resource;

/**
 * Class UpdateResourceRequest
 * @package App\Http\Requests\Project\Resource
 */
class UpdateResourceRequest extends ResourceRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'name' => 'max:255',
            'project_id' => 'exists:projects,id',
            'position' => 'integer'
        ]);
    }
}
