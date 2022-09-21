<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->float('monthly_price')->nullable();
            $table->float('annual_price')->nullable();
            $table->float('lifetime_price')->nullable();
            $table->enum('recommended', ['yes', 'no']);
            $table->integer('scan_limit_per_month')->nullable();
            $table->integer('frequency')->nullable();
            $table->integer('additional_field_limit')->nullable();
            $table->enum('hide_branding', ['yes', 'no']);
            $table->boolean('status')->nullable();
            $table->float('customize_card')->default(0);
            $table->integer('team_member')->nullable();
            $table->string('options')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('member_plans');
    }
}
