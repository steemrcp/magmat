<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_users', function (Blueprint $table) {
          $table->string('id');
          $table->string('company_id')->nullable();
          $table->string('user_id')->nullable();
          $table->string('invitedby_id')->nullable();
          $table->enum('role',['Owner','Admin','Member'])->default('Member');
          $table->boolean('invite_accepted')->default(false);
          $table->dateTime('created')->nullable();
          $table->dateTime('modified')->nullable();
          $table->primary('id');
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
        Schema::dropIfExists('company_users');
    }
}
