<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('properties');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->longText('content');

            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('properties');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('name');
            $table->string('directory');

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
        Schema::dropIfExists('notes');
    }
}
