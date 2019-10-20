<?php

namespace App\Http\Requests\User;

class UpdateUserRequest extends UserRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'surname' => ['max:255'],
            'name' => ['string', 'max:255'],
            'middle_name' => ['max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
            'role_id' => ['exists:roles,id'],
        ]);
    }
}
