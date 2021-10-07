<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->string('product_code')->default("default");
            $table->string('name');
            $table->string('avatar')->default("https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg");
            $table->string('bed');
            $table->integer('area')->unsigned();
            $table->integer('max_person');
            $table->boolean('refund')->default(0);
            $table->boolean('breakfast')->default(0);
            $table->integer('price');

            
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_types');
    }
}
