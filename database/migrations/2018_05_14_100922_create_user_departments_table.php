<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_departments', function (Blueprint $table) {
          $table->string('id');
            $table->string('user_id')->nullable();
            $table->string('department_id')->nullable();
            $table->enum('edit_access', ['None', 'Me', 'All'])->default('Me');
            $table->enum('view_access', ['Me', 'All'])->default('Me');
            $table->enum('approve_access', ['None', 'All', 'Super'])->default('None');
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
        Schema::dropIfExists('user_departments');
    }
}
