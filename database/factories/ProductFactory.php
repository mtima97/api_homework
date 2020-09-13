<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Bezhanov\Faker\ProviderCollectionHelper;

$factory->define(Product::class, function (Faker $faker) {
    ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'name' => $faker->productName,
        'color' => $faker->safeColorName,
        'weight' => $faker->randomFloat(2),
        'price' => $faker->randomDigit
    ];
});
