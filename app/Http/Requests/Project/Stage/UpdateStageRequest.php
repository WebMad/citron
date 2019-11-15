<?php

namespace App\Http\Requests\Project\Stage;

class UpdateStageRequest extends StageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'description' => 'max:255',
            'project_id' => 'exists:projects,id',
            'position' => 'integer'
        ]);
    }
}
