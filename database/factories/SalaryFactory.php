<?php

namespace Database\Factories;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Salary::class;
    public function definition(): array
    {
        return [
            'base_salary' => $this->faker->numberBetween(1000, 10000),
            'user_id' => User::factory(),
        ];
    }
}
