<?php

use App\ProjectRole;
use Illuminate\Database\Seeder;

class ProjectRolesSeeder extends Seeder
{
    protected $project_roles = [
        ['id' => 1, 'name' => 'Тьютор'],
        ['id' => 2, 'name' => 'Наставник'],
        ['id' => 3, 'name' => 'Лидер'],
        ['id' => 4, 'name' => 'Участник'],
    ];

    /**
     * Run the database seeds.
     *
     * @param ProjectRole $projectRole
     * @return void
     */
    public function run(ProjectRole $projectRole)
    {
        foreach ($this->project_roles as $role) {
            $projectRole::firstOrCreate($role);
        }
    }
}
