<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description')->default('');
            $table->integer('qty_in_stock')->unsigned();
            $table->float('price_per_unit', 99, 2);

            $table->boolean('record_deleted')->default(0);
            $table->timestamps();
            
        });

        // create some dummy product data
        DB::table('product')->insert([
            [
                'name' => 'pencil',
                'description' => 'Faber-Castell 0.5 lead mechanical pencil',
                'qty_in_stock' => 5,
                'price_per_unit' => 2.00
            ],
            [
                'name' => 'notebook',
                'description' => 'A4-sized notebook with Mickey Mouse on cover, 80 pages including cover',
                'qty_in_stock' => 10,
                'price_per_unit' => 4.50
            ],
            [
                'name' => 'colored push pin',
                'description' => '100 colourful push pin in a light, transparent container',
                'qty_in_stock' => 8,
                'price_per_unit' => 1.70
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
        Schema::dropIfExists('product');
    }
}
