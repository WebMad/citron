<?php

namespace App\Http\Services;


use App\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @property User $model
 * @package App\Http\Services
 */
class UserService extends BaseService
{

    /**
     * UserService constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function create($params)
    {
        return $this->model::create([
            'surname' => isset($params['surname']) ? $params['surname'] : null,
            'name' => $params['name'],
            'middle_name' => isset($params['middle_name']) ? $params['middle_name'] : null,
            'email' => $params['email'],
            'password' => Hash::make($params['password']),
            'role_id' => $params['role_id'],
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProjects($id)
    {
        return $this->find($id)->confirmedProjects()->get();
    }

    /**
     * @param $email
     * @return User
     */
    public function getUserByEmail($email)
    {
        return $this->model::where('email', $email)->first();
    }

}
