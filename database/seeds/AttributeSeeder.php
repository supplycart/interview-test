<?php

use Illuminate\Database\Seeder;

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
        ]);

        foreach($items as $item) {
            DB::table('attribute')->insert([
                'name' => $item['name'],
            ]);
        }
    }
}
