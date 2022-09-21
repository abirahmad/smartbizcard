<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('card_name');
            $table->string('card_number');
            $table->string('cvc');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('email');
            $table->string('plan_name');
            $table->unsignedBigInteger('plan_id');
            $table->string('plan_expire_date')->nullable();
            $table->string('reminder_date')->nullable();
            $table->unsignedBigInteger('seller_id');
            $table->float('amount');
            $table->float('base_amount');
            $table->boolean('featured')->default(0);
            $table->boolean('urgent')->default(0);
            $table->boolean('highlight')->default(0);
            $table->integer('transaction_time');
            $table->boolean('status')->default(1);
            $table->string('transaction_status');
            $table->string('payment_id');
            $table->string('transaction_gatway');
            $table->string('transaction_ip');
            $table->string('transaction_description');
            $table->string('transaction_method');
            $table->enum('frequency', ['MONTHLY', 'YEARLY', 'LIFETIME']);
            $table->text('billing');
            $table->text('taxes_ids');
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
        Schema::dropIfExists('payment_transactions');
    }
}
