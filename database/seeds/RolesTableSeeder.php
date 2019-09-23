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
        $roles::firstOrCreate(['id' => 1, 'name' => 'Администратор']);
        $roles::firstOrCreate(['id' => 2, 'name' => 'Модератор']);
        $roles::firstOrCreate(['id' => 3, 'name' => 'Пользователь']);
    }


}
