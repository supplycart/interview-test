<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AttributeSeeder extends Seeder
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
                'name' => 'fruits'
            ],
            [
                'name' => 'metal'
            ],
            [
                'name' => 'wood'
            ],
            [
                'name' => 'item'
            ]
        ]);

        foreach($items as $item) {
            DB::table('attribute')->insert([
                'name' => $item['name'],
            ]);
        }
    }
}
