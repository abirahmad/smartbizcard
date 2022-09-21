<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('color')->nullable();
            $table->string('title')->nullable();
            $table->string('full_name')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->text('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_office')->nullable();
            $table->boolean('status')->default(0);
            $table->string('main_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('details')->nullable();
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
        Schema::dropIfExists('vcards');
    }
}
