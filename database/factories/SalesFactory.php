<?php

namespace Database\Factories;

use App\Models\Sales;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sales::class;

    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 100),
            'profit' => $this->faker->numberBetween(1000, 10000),
            'user_id' => User::factory(),
            'storage_id' => Storage::factory(),
        ];
    }
}
