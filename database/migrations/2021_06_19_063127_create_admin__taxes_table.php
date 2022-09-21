<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin__taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('internal_name');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('value');
            $table->enum('value_type', ['percentage', 'fixed']);
            $table->enum('type', ['inclusive', 'exclusive']);
            $table->enum('billing_type', ['personal', 'business', 'both']);
            $table->string('country');
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
        Schema::dropIfExists('admin__taxes');
    }
}
