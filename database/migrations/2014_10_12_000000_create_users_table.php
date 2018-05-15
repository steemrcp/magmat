<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->string('id');
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('active_company')->nullable();
          $table->string('profile_photo_id')->nullable();
          $table->boolean('verified')->default(false);
          $table->boolean('active')->default(false);
          $table->dateTime('created')->nullable();
          $table->dateTime('modified')->nullable();
          $table->primary('id');
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
