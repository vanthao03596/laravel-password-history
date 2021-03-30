<?php

use Faker\Generator as Faker;
use Vanthao03596\LaravelPasswordHistory\Tests\TestSupport\TestModels\TestModel;

$factory->define(TestModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
