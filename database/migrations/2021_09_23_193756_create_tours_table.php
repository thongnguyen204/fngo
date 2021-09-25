<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tour_code');
            $table->string('title');
            $table->bigInteger('price');
            $table->date('departure_date');
            $table->string('departure_place');
            $table->integer('passenger_num');
            $table->string('departure_time');
            $table->integer('day_number');
            $table->integer('tourGuide_id')->nullable();

            $table->string('content')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
