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
        Schema::create('students', function (Blueprint $table) {
            //! id :
            $table -> id();

            //! name , email and password :
            $table -> text('name') ;
            $table -> string('email') -> unique() ;
            $table -> string('password') ;

            //! birthdate :
            $table -> date('birthdate') ;

            //! info :
            $table -> bigInteger('grade_id') -> unsigned() ;
            $table -> bigInteger('classroom_id') -> unsigned() ;
            $table -> bigInteger('section_id') -> unsigned() ;
            $table -> bigInteger('blood_id') -> unsigned() ;
            $table -> bigInteger('nationality_id') -> unsigned() ;
            $table -> bigInteger('gender_id') -> unsigned() ;
            $table -> bigInteger('parent_id') -> unsigned() ;
            $table -> string('year_academic') ;

            $table -> softDeletes() ;

            //! foreign keys :
            $table -> foreign('grade_id') -> references('id') -> on('Grades') -> cascadeOnDelete() ;
            $table -> foreign('classroom_id') -> references('id') -> on('Classrooms') -> cascadeOnDelete() ;
            $table -> foreign('section_id') -> references('id') -> on('sections') -> cascadeOnDelete() ;
            $table -> foreign('blood_id') -> references('id') -> on('bloods') -> cascadeOnDelete() ;
            $table -> foreign('nationality_id') -> references('id') -> on('nationalities') -> cascadeOnDelete() ;
            $table -> foreign('gender_id') -> references('id') -> on('genders') -> cascadeOnDelete() ;
            $table -> foreign('parent_id') -> references('id') -> on('my_parents') -> cascadeOnDelete() ;

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
        Schema::dropIfExists('students');
    }
};
