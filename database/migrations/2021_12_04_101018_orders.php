<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $bp) {
            $bp->id();
            $bp->dateTime('order_date');
            $bp->unsignedBigInteger('product_id');
            $bp->unsignedBigInteger('customer_id');
            $bp->integer('qty');
            $bp->double('price');
            $bp->foreign('product_id')->references('id')->on('products');
            $bp->foreign('customer_id')->references('id')->on('customers');
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
    }
}
