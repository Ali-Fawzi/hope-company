<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Storage;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Task::class;
    public function definition(): array
    {
        return [
            'starting_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'ends_at' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'title' => $this->faker->sentence,
            'location' => $this->faker->address,
            'required_profit' => $this->faker->numberBetween(1000, 10000),
            'commission_rates' => $this->faker->numberBetween(1, 100),
            'user_id' => User::factory(),
            'item_id' => Storage::factory(),
        ];
    }
}
