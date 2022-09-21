<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_transaction_id');
            $table->string('card_name');
            $table->string('email');
            $table->string('plan_name');
            $table->unsignedBigInteger('plan_id');
            $table->float('amount');
            $table->string('payment_id');
            $table->string('transaction_method');
            $table->enum('frequency', ['MONTHLY', 'YEARLY', 'LIFETIME']);
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
        Schema::dropIfExists('payment_records');
    }
}
