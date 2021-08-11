<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('parent_email');
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('student_name');
            $table->string('student_age')->nullable();

            $table->string('date')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();

            // fk teacher
            $table->unsignedInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('users');

            // fk teacher
            $table->unsignedInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('users');

            // fk Levels
            $table->unsignedInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels');
            
            $table->string('status_appointment')->nullable(); //reservada, planificada, atendida
            $table->string('type')->nullable();  //prueba, pagada
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
