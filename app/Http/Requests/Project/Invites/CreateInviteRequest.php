<?php

namespace App\Http\Requests\Project\Invites;

use App\Http\Requests\BaseRequest;

/**
 * Class CreateInviteRequest
 * @package App\Http\Requests\Project\Invites
 */
class CreateInviteRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'exists:invite_statuses,id',
        ];
    }
}
