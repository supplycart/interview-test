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
            $table->string('password', 8);

            $table->integer('register_on')->unsigned();
            $table->boolean('record_deleted')->default(0);
            $table->timestamps();
        });

        $datetime = new DateTime();
        $datetime = $datetime->getTimeStamp();
        DB::table("customer")->insert([
            [
                "fname"=>"test",
                "lname"=>"test",
                "email"=>"test@test.com",
                "password"=>"admin",
                "register_on"=>$datetime
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
