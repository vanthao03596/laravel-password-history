<?php

use Vanthao03596\LaravelPasswordHistory\Tests\TestSupport\TestModels\TestModel;

$factory->define(TestModel::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'password' => $password ?: $password = bcrypt('password'),
    ];
});
