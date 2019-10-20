<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InviteStatusesTableSeeder extends Seeder
{

    protected $invite_statuses = [
        ['id' => 1, 'name' => 'Запрос отправлен'],
        ['id' => 2, 'name' => 'Запрос принят'],
        ['id' => 3, 'name' => 'Запрос отклонен'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->invite_statuses as $invite_status) {
            DB::table('invite_statuses')->updateOrInsert($invite_status);
        }
    }
}
