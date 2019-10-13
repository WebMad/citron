<?php

namespace App\Http\Requests\Project\Stage;

use App\Http\Requests\BaseRequest;

class StageRequest extends BaseRequest
{

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('project_stage');
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
            'id' => 'required|exists:project_stages,id'
        ];
    }
}
