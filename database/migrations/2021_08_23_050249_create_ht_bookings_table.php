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
            $table->increments('id');
            $table->integer('room_id')->unsigned();
            $table->integer('receipt_detail_id')->unsigned();
            $table->date('arrive');
            $table->date('checkout');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('receipt_detail_id')->references('id')->on('receipt_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('ht_bookings', function (Blueprint $table) {
            $table->dropForeign('ht_bookings_room_id_foreign');
            $table->dropForeign('ht_bookings_receipt_detail_id_foreign');
            
        });
        Schema::dropIfExists('ht_bookings');
    }
}
