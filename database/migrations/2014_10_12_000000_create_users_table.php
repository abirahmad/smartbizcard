<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->enum('user_type',['user','employer'])->nullable();
            $table->decimal('balance',20,2)->nullable();
            $table->string('confirm')->nullable();
            $table->string('email')->unique();
            $table->string('designation')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('view')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_admin')->nullable();
            $table->string('tag_line')->nullable();
            $table->string('description')->nullable();
            $table->date('dob')->nullable();
            $table->decimal('salary_min')->nullable();
            $table->decimal('salary_max')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('category')->nullable();
            $table->unsignedBigInteger('subcategory')->nullable();
            $table->enum('sex',['male','female'])->nullable();
            $table->string('phone')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('city_code')->nullable();
            $table->string('state_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('image')->nullable();
            $table->date('last_active')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
