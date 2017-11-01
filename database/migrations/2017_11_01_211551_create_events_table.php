<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_types', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('level');
          $table->string('name');
          $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('event_type_id')->unsigned();
            $table->foreign('event_type_id')->references('id')->on('event_types');

            $table->string('name');
            $table->string('description');

            $table->timestamps();
        });

        Schema::create('event_property', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('event_id')->unsigned();
          $table->foreign('event_id')->references('id')->on('events');

          $table->integer('property_id')->unsigned();
          $table->foreign('property_id')->references('id')->on('properties');

          $table->date('date');
          $table->time('time');

          $table->dateTime('completed')->nullable();

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
        Schema::dropIfExists('event_property');
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_types');
    }
}
