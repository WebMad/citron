<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('feed_id');
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->boolean('is_discussion')->default(false);
            $table->boolean('is_resolved')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table->foreign('feed_id')
                ->references('id')
                ->on('feeds')
                ->onDelete('CASCADE');

            $table->foreign('reply_id')
                ->references('id')
                ->on('comments')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
