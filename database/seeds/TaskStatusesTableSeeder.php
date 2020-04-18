<?php

use App\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusesTableSeeder extends Seeder
{

    protected $tasks = [
        ['id' => 1, 'name' => 'Новое'],
        ['id' => 2, 'name' => 'Исправление'],
        ['id' => 3, 'name' => 'Документация'],
    ];

    /**
     * Run the database seeds.
     *
     * @param TaskStatus $taskStatus
     * @return void
     */
    public function run(TaskStatus $taskStatus)
    {
        foreach ($this->tasks as $task) {
            TaskStatus::firstOrCreate($task);
        }
    }


}
