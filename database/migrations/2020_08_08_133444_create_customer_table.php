<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 8); //change to bcrypt()

            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('record_deleted')->default(0);
        });

        DB::table("customer")->insert([
            [
                "fname"=>"test",
                "lname"=>"test",
                "email"=>"test@test.com",
                "password"=>"admin"
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
        Schema::dropIfExists('customer');
    }
}
