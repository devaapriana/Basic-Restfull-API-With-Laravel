<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $bp) {
            $bp->id();
            $bp->string('email', 120)->unique();
            $bp->string('first_name', 50);
            $bp->string('last_name', 50);
            $bp->string('city', 50);
            $bp->string('address', 250);
            $bp->string('password', 200);
            $bp->string('token', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
