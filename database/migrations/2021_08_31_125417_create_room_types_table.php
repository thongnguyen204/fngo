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
            $table->string('product_code')->unique()->default("default");
            $table->string('name');
            //4 is roomtype
            $table->integer('category_id')->unsigned()->default(4);
            $table->string('avatar')->default("https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg");
            $table->string('bed');
            $table->integer('purchases_number')->default(0);
            $table->integer('area')->unsigned();
            $table->integer('max_person');
            $table->boolean('refund')->default(0);
            $table->boolean('breakfast')->default(0);
            $table->integer('price');

            
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_types', function (Blueprint $table) {
            $table->dropForeign('room_types_category_id_foreign');
        });
        Schema::dropIfExists('room_types');
    }
}
