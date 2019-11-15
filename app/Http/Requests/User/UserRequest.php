<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests\User
 */
class UserRequest extends BaseRequest
{

    /**
     * @param null $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('user');
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
            'id' => 'required|exists:users,id'
        ];
    }
}
