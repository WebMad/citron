<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('implementer_id')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->timestamp('prospective_date')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('CASCADE');

            $table->foreign('status_id')
                ->references('id')
                ->on('task_statuses')
                ->onDelete('SET NULL');

            $table->foreign('implementer_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table->foreign('stage_id')
                ->references('id')
                ->on('task_stages')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
