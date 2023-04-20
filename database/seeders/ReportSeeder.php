<?php

namespace Database\Seeders;

use App\Models\Reports;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reports::factory(3)->for(User::factory())->create();
    }
}
