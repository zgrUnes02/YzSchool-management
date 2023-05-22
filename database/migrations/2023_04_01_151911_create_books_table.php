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
        Schema::create('books', function (Blueprint $table) {
            $table -> id() ;
            $table -> string('title') ;
            $table -> string('file_name') ;
            $table -> foreignId('grade_id') -> references('id') -> on('Grades') -> cascadeOnDelete() ;
            $table -> foreignId('classroom_id') -> references('id') -> on('Classrooms') -> cascadeOnDelete() ;
            $table -> foreignId('section_id') -> references('id') -> on('sections') -> cascadeOnDelete() ;
            $table -> foreignId('teacher_id') -> references('id') -> on('teachers') -> cascadeOnDelete() ;
            $table -> timestamps() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
