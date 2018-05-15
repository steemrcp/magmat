<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invites', function (Blueprint $table) {
          $table->string('id');
          $table->string('user_id');
          $table->string('company_id');
          $table->string('email');
          $table->string('reference');
          $table->boolean('invite_accepted')->default(false);
          $table->dateTime('created');
          $table->dateTime('modified');
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
        Schema::dropIfExists('user_invites');
    }
}
