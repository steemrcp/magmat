<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
          $table->string('id');
          $table->string('company_id');
          $table->string('name');
          $table->text('description')->nullable();
          $table->string('colour_hex')->nullable();
          $table->integer('position');
          $table->integer('min_approval');
          $table->boolean('archived')->default(false);
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
        Schema::dropIfExists('departments');
    }
}
