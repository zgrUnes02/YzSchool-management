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
        Schema::create('fees', function (Blueprint $table) {
            $table -> id();

            //! name and amount :
            $table -> string('name') ;
            $table -> integer('anmount') ;

            //! grade , classroom and year :
            $table -> unsignedBigInteger('grade_id') ;
            $table -> foreign('grade_id') -> references('id') -> on('Grades') -> cascadeOnDelete() ;

            $table -> unsignedBigInteger('classroom_id') ;
            $table -> foreign('classroom_id') -> references('id') -> on('Classrooms') -> cascadeOnDelete() ;

            $table -> string('year_academic') ;
            $table -> integer('fee_type') ;

            //! description :
            $table -> text('description') ;

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
        Schema::dropIfExists('fees');
    }
};
