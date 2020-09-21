<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
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
                'name' => 'Apple',
                'description' => 'An apple',
                'price' => 10
            ],
            [
                'name' => 'Orange',
                'description' => 'An orange',
                'price' => 11
            ],
            [
                'name' => 'Phone',
                'description' => 'A phone',
                'price' => 12
            ],
            [
                'name' => 'Chair',
                'description' => 'Chair',
                'price' => 13
            ],
            [
                'name' => 'Key',
                'description' => 'A key',
                'price' => 14
            ],
        ]);

        foreach($items as $item) {
            DB::table('product')->insert([
                'name' => $item['name'],
                'description' => $item['description'],
                'price' => $item['price'],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
