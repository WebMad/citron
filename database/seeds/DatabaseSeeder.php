<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            ProjectRolesSeeder::class,
            InviteStatusesTableSeeder::class,
            TaskStatusesTableSeeder::class,
            FeedTypesTableSeeder::class,
        ]);
    }
}
