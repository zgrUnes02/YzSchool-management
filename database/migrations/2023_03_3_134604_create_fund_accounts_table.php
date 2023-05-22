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
        Schema::create('fund_accounts', function (Blueprint $table) {
            $table -> id() ;
            $table -> date('date') ;

            $table -> foreignId('receipt_id') -> nullable() -> references('id') -> on('receipts') -> cascadeOnDelete() ;
            $table -> foreignId('pay_id') -> nullable() -> references('id') -> on('pays') -> cascadeOnDelete() ;

            $table -> integer('debit') -> nullable() ;
            $table -> integer('credit') -> nullable() ;
            
            $table -> text('description') ;

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
        Schema::dropIfExists('fund_accounts');
    }
};
