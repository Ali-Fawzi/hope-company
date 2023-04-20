<?php

namespace Database\Seeders;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salary::factory(3)->for(User::factory())->create();
    }
}
