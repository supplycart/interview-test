<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'name' => $faker->word,
      'price' => $faker->numberBetween($min = 50, $max = 1000),
      'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
