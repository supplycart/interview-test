<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Cart and products
         * User can keep on adding the same product to cart when product already existed?
         * after check out this time, next time user can still add the same product into the cart
         * so, solely cart_id + prod_id are not sufficient to be primary key
         * hence, make use of surrogate key
         */
        Schema::create('cart_item', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("cart_id")->unsigned();
            $table->integer("prod_id")->unsigned();
            $table->integer("added_date")->unsigned();
            $table->boolean("checked_out")->default(0);
        });

        Schema::table("cart_item", function(Blueprint $table){
            $table->foreign("cart_id")->references("id")->on("cart");
            $table->foreign("prod_id")->references("id")->on("product");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_item');
    }
}
