<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $bp) {
            $bp->id();
            $bp->string('title', 80);
            $bp->string('category', 50);
            $bp->double('price');
            $bp->text('description');
            $bp->integer('stock');
            $bp->boolean('free_shipping');
            $bp->double('rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
