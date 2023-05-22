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
        Schema::create('settings', function (Blueprint $table) {
            $table -> id() ;
            $table -> string('current_session') ;
            $table -> string('school_title') ;
            $table -> string('school_name') ;
            $table -> date('end_first_term') ;
            $table -> date('end_second_term') ;
            $table -> string('phone') ;
            $table -> string('address') ;
            $table -> string('school_email') ;
            $table -> string('logo') ;
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
        Schema::dropIfExists('settings');
    }
};
