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
        Schema::create('cart_item', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->integer("prod_id")->unsigned();
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean("checked_out")->default(0);
        });

        Schema::table("cart_item", function(Blueprint $table){
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("prod_id")->references("id")->on("product");
        });

        DB::table("cart_item")->insert([
            [
                "user_id"=>1,
                "prod_id"=>1
            ],
            [
                "user_id"=>1,
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
