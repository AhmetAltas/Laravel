<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

$factory->define(App\Category::class, function (Faker $faker) {
	$lorem = new Lorem($faker);

    return [
        'name' => $faker->name,
        'description' => $lorem->words(10,true),
    ];
});
