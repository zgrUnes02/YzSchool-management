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
        Schema::create('teacher_section_', function (Blueprint $table) {

            //! Id :
            $table->id();

            //! BigInteger and Foreign Key of Teachers table :
            $table->bigInteger('teacher_id') -> unsigned() ;
            $table->foreign('teacher_id') -> references('id') -> on('teachers') -> cascadeOnDelete() ;

            //! BigInteger and Foreign Key of Sections table :
            $table->bigInteger('section_id') -> unsigned() ;
            $table->foreign('section_id') -> references('id') -> on('sections') -> cascadeOnDelete() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_section_');
    }
};
