<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_types', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->timestamps();
        });

        Schema::create('actors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email_address');

            $table->boolean('sms_enabled')->default(false);
            $table->boolean('email_enabled')->default(false);

            $table->timestamps();
        });

        Schema::create('actor_property', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('actor_id')->unsigned();
          $table->foreign('actor_id')->references('id')->on('actors');

          $table->integer('actor_type_id')->unsigned();
          $table->foreign('actor_type_id')->references('id')->on('actor_types');

          $table->integer('property_id')->unsigned();
          $table->foreign('property_id')->references('id')->on('properties');

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
        Schema::dropIfExists('actor_property');
        Schema::dropIfExists('actors');
        Schema::dropIfExists('actor_types');
    }
}
