<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');

            // fk Levels
            $table->unsignedInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels');

            $table->string('lesson_number')->nullable();

            $table->string('topic_1')->nullable();
            $table->string('topic_2')->nullable();
            $table->string('topic_3')->nullable();
            $table->string('topic_4')->nullable();
            $table->string('topic_5')->nullable();

            $table->string('homework')->nullable(); // Title Homework
            $table->string('file_homework')->nullable(); // File Homework

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
