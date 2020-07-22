<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath'=> 'https://my-test-11.slatic.net/p/d9a4c4b00a3480bad06aa09ccaea2ba4.jpg_720x720q80.jpg_.webp',
            'title'=> 'Tennis Racket',
            'description' => 'Wilson Court Zone LITE Tennis Rackets + 1 Tubes Wilson Australian Open Tennis Balls',
            'price' => 180
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=> 'https://my-test-11.slatic.net/p/888952d1f9e70109de74f8204e2dba09.jpg_720x720q80.jpg_.webp',
            'title'=> 'Tennis Balls',
            'description' => 'Wilson Tour Premier All Court Tennis Ball',
            'price' => 60
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=> 'https://sf.ezoiccdn.com/ezoimgfmt/tennispredict.com/wp-content/uploads/2019/12/rs.php-5.jpg?ezimgfmt=rs:372x259/rscb1/ng:webp',
            'title'=> 'Tennis Bag',
            'description' => 'Wilson Team III 6 Pack Tennis Bag - Red/White',
            'price' => 250
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=> 'https://my-test-11.slatic.net/p/d179fea9e5bfd402c9e8a217456397a5.jpg_720x720q80.jpg_.webp',
            'title'=> 'Tennis Shoes',
            'description' => 'Wilson Mens Lunar Ballistec 1.5 Legend Tennis Shoes - Blue/White',
            'price' => 500
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath'=> 'https://cdn.goodao.net/dksportbot/x328.jpg.pagespeed.ic.gLg78gjaxp.webp',
            'title'=> 'Tennis Ball Machine',
            'description' => 'New Tennis Ball Machine With Remote Control DT2 Tennis Robot',
            'price' => 650
        ]);
        $product->save();
    }
}
