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
            $table->integer('receipt_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->string('category');
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->timestamps();

            // $table->primary(['receipt_id','service_id']);
            $table->foreign('receipt_id')->references('id')->on('receipts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipt__details', function (Blueprint $table) {
            $table->dropForeign('receipt__details_receipt_id_foreign');
        });
        
        Schema::dropIfExists('receipt__details');
    }
}
