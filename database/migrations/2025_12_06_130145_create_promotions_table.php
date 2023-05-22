<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            //! id in table promotions :
            $table->id();

            //! student's id :
            $table -> unsignedBigInteger('student_id') ;

            //! grade , classroom and section ids :
            $table -> unsignedBigInteger('from_grade') ;
            $table -> unsignedBigInteger('from_classroom') ;
            $table -> unsignedBigInteger('from_section') ;
            $table -> string('from_year') ;

            $table -> unsignedBigInteger('to_grade') ;
            $table -> unsignedBigInteger('to_classroom') ;
            $table -> unsignedBigInteger('to_section') ;
            $table -> string('to_year') ;

            $table -> foreign('student_id') -> references('id') -> on('students') -> cascadeOnDelete() ;

            //! grade , classroom and section foreign key :
            $table -> foreign('from_grade') -> references('id') -> on('Grades') -> onDelete('cascade') ;
            $table -> foreign('from_classroom') -> references('id') -> on('Classrooms') -> onDelete('cascade') ;
            $table -> foreign('from_section') -> references('id') -> on('sections') -> onDelete('cascade') ; 

            $table -> foreign('to_grade') -> references('id') -> on('Grades') -> onDelete('cascade') ;
            $table -> foreign('to_classroom') -> references('id') -> on('Classrooms') -> onDelete('cascade') ;
            $table -> foreign('to_section') -> references('id') -> on('sections') -> onDelete('cascade') ;

            //? soft delete :
            // $table -> softDeletes() ;

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
        Schema::dropIfExists('promotions');
    }
};
