<?php

namespace Database\Seeders;

use App\Models\Salary;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->has(Salary::factory())
            ->has(Task::factory()->count(3))
            ->create();
    }
}
