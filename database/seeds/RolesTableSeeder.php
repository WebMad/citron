<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    protected $roles = [
        ['id' => 1, 'name' => 'Администратор'],
        ['id' => 2, 'name' => 'Модератор'],
        ['id' => 3, 'name' => 'Пользователь'],
    ];

    /**
     * Run the database seeds.
     *
     * @param Role $roleModel
     * @return void
     */
    public function run(Role $roleModel)
    {
        foreach ($this->roles as $role) {
            $roleModel::firstOrCreate($role);
        }
    }


}
