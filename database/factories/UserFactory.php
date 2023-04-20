<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;


    public function definition(): array
    {
        $arabicNames = ['احمد فاضل','عبد الله محمد',
                        'زهراء حسن','ابراهيم علاء',
                        'محمد غالب','مرتضى علي',
                        'زينب جبار','فاطمة احمد',
                        'الاء حسن','مريم محمد'];
        return [
            'name' => Arr::random($arabicNames),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'user_type' => $this->faker->randomElement(['manager', 'supervisor', 'salesPerson']),
            'password' => bcrypt('88888888'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
