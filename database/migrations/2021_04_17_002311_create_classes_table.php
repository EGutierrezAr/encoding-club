<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();

            // fk Students
            $table->unsignedInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('users');

            // fk Levels
            $table->unsignedInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels');

            // fk Levels
            $table->unsignedInteger('lesson_id')->nullable();
            $table->foreign('lesson_id')->references('id')->on('lessons');

            $table->string('activity_1')->nullable();
            $table->string('activity_2')->nullable();
            $table->string('activity_3')->nullable();
            $table->string('activity_4')->nullable();
            $table->string('activity_5')->nullable();

            $table->integer('status'); // '0' = NO REALIZADA,'1','FINALIZADA'
            $table->integer('score_1')->nullable(); //
            $table->integer('score_2')->nullable(); // 
            $table->integer('score_3')->nullable(); // 
            $table->integer('score_4')->nullable(); // 
            $table->integer('score_5')->nullable(); // 

            $table->string('url_homework')->nullable();  
            $table->string('file_homework')->nullable(); 
            $table->integer('status_homework')->nullable(); 
            $table->integer('score_homework')->nullable(); 
            
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
        Schema::dropIfExists('classes');
    }
}
