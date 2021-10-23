<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code')->default('hotel_');
            $table->string('name');
            $table->string('category')->default('nơi ở');
            $table->string('avatar');
            $table->string('address');
            $table->integer('purchases_number')->default(0);
            $table->integer('city_province_id')->unsigned();
            
            $table->integer('price')->unsigned();
            
            $table->foreign('category')->references('name')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign('hotels_category_foreign');
        });
        Schema::dropIfExists('hotels');
    }
}
