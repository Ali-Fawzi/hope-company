<?php

namespace Database\Factories;

use App\Models\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Storage>
 */
class StorageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Storage::class;
    public function definition(): array
    {
        return [
            'item_name' => $this->faker->unique()->word,
            'item_price' => $this->faker->numberBetween(1, 1500),
            'item_in_stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
