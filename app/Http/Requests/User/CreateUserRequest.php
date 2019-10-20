<?php

namespace App\Http\Requests\User;

use App\Exceptions\RegisterUserException;
use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class CreateUserRequest
 * @package App\Http\Requests\User
 */
class CreateUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'surname' => ['string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['nullable', 'exists:roles,id'],
        ];
    }
}
