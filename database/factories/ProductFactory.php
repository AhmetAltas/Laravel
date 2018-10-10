<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

$factory->define(App\Product::class, function (Faker $faker) {
	$lorem = new Lorem($faker);
    return [
        'name' => $faker->name,
        'description' => $lorem->words(10,true),
        'price' => $faker->numberBetween(1 ,20),
        'category_id' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
    ];
});
