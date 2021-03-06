<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
          $table->string('id');
          $table->string('name')->nullable();
          $table->string('slug')->nullable();
          $table->string('currency_id')->nullable();
          $table->string('main_user')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
