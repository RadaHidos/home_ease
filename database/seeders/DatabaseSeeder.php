<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Service::factory(10)->create();
        Comment::factory(20)->create();
    }
}
