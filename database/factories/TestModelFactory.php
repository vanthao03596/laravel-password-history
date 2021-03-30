<?php

namespace Vanthao03596\LaravelPasswordHistory\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Vanthao03596\LaravelPasswordHistory\Tests\TestSupport\TestModels\TestModel;

class TestModelFactory extends Factory
{
    protected $model = TestModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];
    }
}
