<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = Str::slug($title, '-');
    return [
        'product_code' => $faker->unique()->numerify('ABC###'),
        'name' => $title,
        'slug' => $slug,
        'amount' => $faker->randomFloat(2, 10, 100),
        'description' => $faker->realText(200),
        'tag_line' => $faker->catchPhrase,
        'vendor_id' => 1
    ];
});

