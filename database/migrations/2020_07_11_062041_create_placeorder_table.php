<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeorder', function (Blueprint $table) {
            $table->increments('placeorder_id');
            $table->integer('id');
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->string('image');
            $table->string('productname');
            $table->string('productdesc');
            $table->integer('quantity');
            $table->integer('totalprice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placeorder');
    }
}
