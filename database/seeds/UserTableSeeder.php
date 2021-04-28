<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Level;
use App\Lessons;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
    		'name' => 'Emiliano Gutiérrez A',
	        'email' => 'admin@hotmail.com',
	        'password' => bcrypt('11111111'), // password
	        'role' => 'admin'
    	]);

        Level::create([
    		'level' => 'BASICO',
	        'course' => '1B',
	        'class_number' => 8
    	]);
        Level::create([
    		'level' => 'BASICO',
	        'course' => '2B',
	        'class_number' => 10
    	]);
        Level::create([
    		'level' => 'BASICO',
	        'course' => '3B',
	        'class_number' => 10
    	]);
        Level::create([
    		'level' => 'MEDIO',
	        'course' => '1M',
	        'class_number' => 8
    	]);

        Level::create([
    		'level' => 'MEDIO',
	        'course' => '1M',
	        'class_number' => 10
    	]);
        Level::create([
    		'level' => 'MEDIO',
	        'course' => '1M',
	        'class_number' => 10
    	]);
        Level::create([
    		'level' => 'AVANZADO',
	        'course' => '1B',
	        'class_number' => 10
    	]);
        Level::create([
    		'level' => 'AVANZADO',
	        'course' => '1B',
	        'class_number' => 10
    	]);
        Level::create([
    		'level' => 'AVANZADO',
	        'course' => '1M',
	        'class_number' => 10
    	]);


		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '1',
	        'topic_1' => 'Introducción',
			'topic_2' => '',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '2',
	        'topic_1' => 'Comentarios',
			'topic_2' => 'Sentencia IF',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '3',
	        'topic_1' => 'Palabras Reservadas',
			'topic_2' => 'Sentencia IF',
			'topic_3' => 'Sentencia FOR',
    	]);
		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '4',
	        'topic_1' => 'Introducción',
			'topic_2' => '',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '5',
	        'topic_1' => 'Comentarios',
			'topic_2' => 'Sentencia IF',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '6',
	        'topic_1' => 'Palabras Reservadas',
			'topic_2' => 'Sentencia IF',
			'topic_3' => 'Sentencia FOR'
    	]);
		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '7',
	        'topic_1' => 'Introducción',
			'topic_2' => '',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 1,
	        'lesson_number' => '8',
	        'topic_1' => 'Comentarios',
			'topic_2' => 'Sentencia IF',
			'topic_3' => ''
    	]);

		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '1',
	        'topic_1' => 'Introducción',
			'topic_2' => '',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '2',
	        'topic_1' => 'Comentarios',
			'topic_2' => 'Sentencia IF',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '3',
	        'topic_1' => 'Palabras Reservadas',
			'topic_2' => 'Sentencia IF',
			'topic_3' => 'Sentencia FOR'
    	]);
		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '4',
	        'topic_1' => 'Introducción',
			'topic_2' => '',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '5',
	        'topic_1' => 'Comentarios',
			'topic_2' => 'Sentencia IF',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '6',
	        'topic_1' => 'Palabras Reservadas',
			'topic_2' => 'Sentencia IF',
			'topic_3' => 'Sentencia FOR'
    	]);
		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '7',
	        'topic_1' => 'Introducción',
			'topic_2' => '',
			'topic_3' => ''
    	]);
		Lessons::create([
    		'level_id' => 2,
	        'lesson_number' => '8',
	        'topic_1' => 'Comentarios',
			'topic_2' => 'Sentencia IF',
			'topic_3' => ''
    	]);
		
       

        factory(User::class, 50)->create();
    }
}
