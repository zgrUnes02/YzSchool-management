<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomsTable extends Migration {

	public function up()
	{
		Schema::create('Classrooms', function(Blueprint $table) {
			$table -> id('id');
			$table -> string('class_name');

			$table -> bigInteger('grade_id') -> unsigned();
			// $table -> foreign('grade_id') -> references('id') -> on('Grades') -> onDelete('cascade') ;
			
			$table -> timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Classrooms');
	}
}
