<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineQuantityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_quantity', function (Blueprint $table) {
            $table->integer("order_id")->unsigned();;
            $table->integer("prod_id")->unsigned();
            $table->integer("quantity")->unsigned();
            $table->unique(["order_id", "prod_id"]);
        });

        Schema::table("line_quantity", function(Blueprint $table){
            $table->foreign("order_id")->references("id")->on("order");
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
        Schema::dropIfExists('line_quantity');
    }
}
