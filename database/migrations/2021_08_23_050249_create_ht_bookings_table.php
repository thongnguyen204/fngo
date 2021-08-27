<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht_bookings', function (Blueprint $table) {
            $table->increments('receipt__detail_id');
            $table->integer('room_id')->unsigned();
            $table->date('arrive');
            $table->date('checkout');
            $table->string('description');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
        });
        // Schema::table('receipt__details', function (Blueprint $table) {
        //     $table->foreign('service_id')->references('id')->on('ht_bookings');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('receipt__details', function (Blueprint $table) {
        //     $table->dropForeign('receipt_details_service_id_foreign');
        // });
        Schema::dropIfExists('ht_bookings');
    }
}
