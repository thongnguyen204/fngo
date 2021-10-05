<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('rooms', function (Blueprint $table) {
        //     // $table->increments('id');
        //     // $table->integer('room_number');
        //     // $table->integer('hotel_id')->unsigned();
        //     // $table->integer('type_id')->unsigned();
        //     // $table->boolean('available')->default(false);
        //     // $table->string('description')->nullable();


        //     // $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('rooms', function (Blueprint $table) {
        //     $table->dropForeign('rooms_hotel_id_foreign');
        // });
        // Schema::dropIfExists('rooms');
    }
}
