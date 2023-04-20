<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Storage;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::factory(10)->has(Task::factory())->create();
    }
}
