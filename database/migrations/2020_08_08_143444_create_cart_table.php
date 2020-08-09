<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cust_id')->unsigned()->unique();

            $table->boolean('record_deleted')->default(0);
            $table->timestamps();
        });
        
        Schema::table('cart', function(Blueprint $table){
            $table->foreign('cust_id')->references('id')->on('customer');
        });

        DB::table("cart")->insert([
            [
                "cust_id"=>1
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
        Schema::dropIfExists('cart');
    }
}
