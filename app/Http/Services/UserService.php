<?php

namespace App\Http\Services;


use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @return Collection|Model[]
     */
    public function all()
    {
        return $this->model::all();
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
     * @param int $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model::find($id);
    }

    public function update($id, $params)
    {
        $user = $this->model::find($id);
        $user->update($params);
        return $user;
    }

    public function delete($id)
    {
        $this->model::find($id)->delete();
    }

}
