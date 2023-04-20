<?php

namespace Database\Factories;

use App\Models\Reports;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reports>
 */
class ReportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reports::class;
    public function definition(): array
    {
        return [
            'report_type' => $this->faker->word,
            'data' => json_encode($this->faker->words(3)),
            'date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'user_id' => User::factory(),
        ];
    }
}
