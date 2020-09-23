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
                'price' => 10,
                'full_file_name' => 'apple.jpg',
            ],
            [
                'name' => 'Orange',
                'description' => 'An orange',
                'price' => 11,
                'full_file_name' => 'orange.jpg',
            ],
            [
                'name' => 'Phone',
                'description' => 'A phone',
                'price' => 12,
                'full_file_name' => 'phone.jpg',
            ],
            [
                'name' => 'Chair',
                'description' => 'Chair',
                'price' => 13,
                'full_file_name' => 'chair.jpg',
            ],
            [
                'name' => 'Key',
                'description' => 'A key',
                'price' => 14,
                'full_file_name' => 'key.jpg',
            ],
        ]);

        foreach($items as $item) {
            DB::table('product')->insert([
                'name' => $item['name'],
                'description' => $item['description'],
                'price' => $item['price'],
                'full_file_name' => $item['full_file_name'],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
