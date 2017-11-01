<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('domain');
          $table->timestamps();
        });

        Schema::create('company_user', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('company_id')->unsigned();
          $table->foreign('company_id')->references('id')->on('companies');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

          $table->timestamps();
        });

        Schema::create('property_user', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('property_id')->unsigned();
          $table->foreign('property_id')->references('id')->on('properties');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('property_user');
        Schema::dropIfExists('company_user');
        Schema::dropIfExists('companies');
    }
}
