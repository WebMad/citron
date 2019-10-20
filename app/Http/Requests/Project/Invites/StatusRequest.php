<?php

namespace App\Http\Requests\Project\Invites;

use App\Http\Requests\BaseRequest;

class StatusRequest extends BaseRequest
{

    /**
     * @param null $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('invite_status');
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
            'id' => 'required|exists:invite_statuses,id'
        ];
    }
}
