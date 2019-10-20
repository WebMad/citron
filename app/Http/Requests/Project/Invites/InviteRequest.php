<?php

namespace App\Http\Requests\Project\Invites;

use App\Http\Requests\BaseRequest;

/**
 * Class InviteRequest
 * @package App\Http\Requests\Project\Invites
 */
class InviteRequest extends BaseRequest
{
    /**
     * @param null $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('project_invite');
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
            'id' => 'required|exists:project_invites,id'
        ];
    }
}
