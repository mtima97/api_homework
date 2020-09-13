<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Bezhanov\Faker\ProviderCollectionHelper;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'name' => $faker->department
    ];
});
