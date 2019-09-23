<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Role $roles
     * @return void
     */
    public function run(Role $roles)
    {
        $roles::firstOrNew(['id' => 1, 'name' => 'Администратор']);
        $roles::firstOrNew(['id' => 2, 'name' => 'Модератор']);
        $roles::firstOrNew(['id' => 3, 'name' => 'Пользователь']);
    }


}
