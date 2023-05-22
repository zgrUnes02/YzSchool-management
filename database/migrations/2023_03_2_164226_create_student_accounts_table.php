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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table -> id();
            $table->date('date');
            $table->string('type');

            $table -> foreignId('student_id') -> references('id') -> on('students') -> cascadeOnDelete() ;
            
            $table -> foreignId('fee_invoice_id') -> nullable() -> references('id') -> on('fee_invoices') -> cascadeOnDelete() ;
            $table -> foreignId('receipt_id') -> nullable() -> references('id') -> on('receipts') -> cascadeOnDelete() ;
            $table -> foreignId('payment_id') -> nullable() -> references('id') -> on('payments') -> cascadeOnDelete() ;
            $table -> foreignId('paym_id') -> nullable() -> references('id') -> on('pays') -> cascadeOnDelete() ;

            $table -> integer('debit') -> nullable() ;
            $table -> integer('cedit') -> nullable() ;

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
        Schema::dropIfExists('student_accounts');
    }
};
