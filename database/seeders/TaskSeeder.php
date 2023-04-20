<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Storage;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory(10)
            ->for(Storage::factory())
            ->for(User::factory()->count(3))
            ->create();
    }
}
