<?php

use App\FeedType;
use Illuminate\Database\Seeder;

class FeedTypesTableSeeder extends Seeder
{

    protected $feed_types = [
        ['id' => 1, 'name' => 'карточка'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->feed_types as $feed_type) {
            FeedType::updateOrCreate(['id' => $feed_type['id']], $feed_type);
        }
    }
}
