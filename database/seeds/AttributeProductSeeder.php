<?php

use Illuminate\Database\Seeder;

class AttributeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = collect([
            [
                'attribute_id' => 1, 
                'product_id'   => 1,
            ],
            [
                'attribute_id' => 1, 
                'product_id'   => 2,
            ],
            [
                'attribute_id' => 2, 
                'product_id'   => 5,
            ],
            [
                'attribute_id' => 3, 
                'product_id'   => 4,
            ],
        ]);

        foreach($items as $item) {
            DB::table('attribute_product')->insert([
                'attribute_id' => $item['attribute_id'],
                'product_id' => $item['product_id'],
            ]);
        }
    }
}
