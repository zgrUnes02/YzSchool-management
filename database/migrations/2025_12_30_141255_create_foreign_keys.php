<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('Grades')
                ->onDelete('cascade') ;
        });

        // Schema::table('sections', function(Blueprint $table) {
        //     $table->foreign('classroom_id')->references('id')->on('Classrooms')
        //         ->onDelete('cascade') ;
        // }); 
        
        Schema::table('my_parents' , function(Blueprint $table){
            
            // Parents Nationalities :
            $table -> foreign('Nationality_Mother_id') -> references('id') -> on('nationalities') ;
            $table -> foreign('Nationality_Father_id') -> references('id') -> on('nationalities') ;

            // Parents Bloods Type :
            $table -> foreign('Blood_Type_Mother_id') -> references('id') -> on('bloods') ;
            $table -> foreign('Blood_Type_Father_id') -> references('id') -> on('bloods') ;

            // Parents Relegions :
            $table -> foreign('Religion_Mother_id') -> references('id') -> on('relegions') ;
            $table -> foreign('Religion_Father_id') -> references('id') -> on('relegions') ;
            
        }) ;

        Schema::table('parent_attachments' , function(Blueprint $table){    
            // Parents Foreign :
            $table -> foreign('parent_id') -> references('id') -> on('my_parents') ;   
        }) ;

	}

	public function down()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->dropForeign('Classrooms_grade_id_foreign');
		});

        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_Grade_id_foreign');
        });

        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_Class_id_foreign');
        }) ;
	}
}
