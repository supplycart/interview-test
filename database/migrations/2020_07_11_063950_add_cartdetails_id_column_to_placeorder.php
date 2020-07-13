<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCartdetailsIdColumnToPlaceorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('placeorder', function (Blueprint $table) {
            $table->integer('cartdetails_id')->after('cart_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('placeorder', function (Blueprint $table) {
            $table->dropColumn('cartdetails_id');
        });
    }
}
