<?php

use App\Feed;
use App\FeedType;
use App\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedIdColumnInTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('feed_id')->nullable();
            $table->foreign('feed_id')
                ->on('feeds')
                ->references('id')
                ->onDelete('SET NULL');
        });

        $tasks = Task::whereNull(['feed_id'])->get();
        foreach ($tasks as $task) {
            $feed = Feed::create([
                'type_id' => FeedType::TASK
            ]);
            $task->feed_id = $feed->id;
            $task->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tasks = Task::where('feed_id', '<>', null)->with('feed')->get();
        foreach ($tasks as $task) {
            $task->feed->delete();
        }

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['feed_id']);
            $table->dropColumn('feed_id');
        });
    }
}
