<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
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
            $table->date('day_start');
            $table->string('place_start');
            $table->integer('space_available');
            $table->string('time_start');
            $table->integer('day_number');
            $table->integer('tourGuide_id');

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
