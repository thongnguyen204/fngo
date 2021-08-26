<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt__details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receipt_id');
            $table->integer('service_id');

            $table->string('category');
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->timestamps();

            // $table->primary(['receipt_id','service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipt__details');
    }
}
