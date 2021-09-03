<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomsTypeForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rooms', function (Blueprint $table) {
            // $table->foreign('hotel_id')->references('hotel_id')->on('room_types');
            // $table->foreign('type')->references('type')->on('room_types');
            $table->foreign('type_id')->references('id')->on('room_types');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_type_id_foreign');
        });
    }
}
