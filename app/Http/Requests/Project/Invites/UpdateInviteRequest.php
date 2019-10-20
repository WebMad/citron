<?php

namespace App\Http\Requests\Project\Invites;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInviteRequest extends InviteRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'project_id' => 'exists:projects,id',
            'user_id' => 'exists:users,id',
            'status_id' => 'exists:invite_statuses,id',
        ]);
    }
}
