<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripSubtripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_subtrips', function (Blueprint $table) {
            $table->integer('trip_id')->unsigned();
            $table->integer('subTrip_id')->unsigned();
            $table->integer('day')->unsigned();

            $table->primary(['trip_id','subTrip_id']);
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->foreign('subTrip_id')->references('id')->on('sub_trips')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_subtrips', function (Blueprint $table) {
            
            
            $table->dropForeign('trip_subtrips_trip_id_foreign');
            $table->dropForeign('trip_subtrips_subTrip_id_foreign');
        });
        Schema::dropIfExists('trip_subtrips');
    }
}
