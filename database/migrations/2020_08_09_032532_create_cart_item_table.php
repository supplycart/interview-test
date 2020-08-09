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
            $table->integer("cust_id")->unsigned();
            $table->integer("prod_id")->unsigned();
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean("checked_out")->default(0);
        });

        Schema::table("cart_item", function(Blueprint $table){
            $table->foreign("cust_id")->references("id")->on("customer");
            $table->foreign("prod_id")->references("id")->on("product");
        });

        DB::table("cart_item")->insert([
            [
                "cust_id"=>1,
                "prod_id"=>1
            ],
            [
                "cust_id"=>1,
                "prod_id"=>2
            ]
        ]);
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
