<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table -> id();
            $table -> string('name') ;
            $table -> foreignId('subject_id') -> references('id') -> on('subjects') -> cascadeOnDelete() ;
            $table -> foreignId('grade_id') -> references('id') -> on('Grades') -> cascadeOnDelete() ;
            $table -> foreignId('classrooms_id') -> references('id') -> on('Classrooms') -> cascadeOnDelete() ;
            $table -> foreignId('section_id') -> references('id') -> on('sections') -> cascadeOnDelete() ;
            $table -> foreignId('teacher_id') -> references('id') -> on('teachers') -> cascadeOnDelete() ;
            $table -> string('path') ;
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
