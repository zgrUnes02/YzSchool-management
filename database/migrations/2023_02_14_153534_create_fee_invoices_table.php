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
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table -> id();
            $table -> date('date') ;

            $table -> bigInteger('student_id') -> unsigned() ;
            $table -> foreign('student_id') -> references('id') -> on('students') -> onDelete('cascade') ; 

            $table -> bigInteger('grade_id') -> unsigned() ;
            $table -> bigInteger('classroom_id') -> unsigned() ;
            $table -> bigInteger('fee_id') -> unsigned() ;

            $table -> foreign('grade_id') -> references('id') -> on('Grades') -> onDelete('cascade') ; 
            $table -> foreign('classroom_id') -> references('id') -> on('Classrooms') -> onDelete('cascade') ;
            $table -> foreign('fee_id') -> references('id') -> on('fees') -> onDelete('cascade') ;

            $table -> integer('amount') ;
            $table -> text('description') -> nullable() ;

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
        Schema::dropIfExists('fee_invoices');
    }
};
