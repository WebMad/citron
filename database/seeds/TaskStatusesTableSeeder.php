<?php

use App\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusesTableSeeder extends Seeder
{

    protected $tasks = [
        ['id' => 1, 'name' => 'Открыто'],
        ['id' => 2, 'name' => 'Закрыто'],
        ['id' => 3, 'name' => 'Архивировано'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->tasks as $task) {
            TaskStatus::updateOrCreate(['id' => $task['id']], $task);
        }
    }


}
