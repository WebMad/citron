<?php

namespace App\Http\Requests\Project\Stage;

use App\Http\Requests\BaseRequest;

class CreateStageRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|max:255',
            'project_id' => 'required|exists:projects,id',
            'position' => 'integer'
        ];
    }
}
