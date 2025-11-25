<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Comment;
use App\Models\Category;
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
        $services = Service::factory(10)->create();
        Comment::factory(20)->create();
        User::factory(5)->create();
        Category::factory(5)->create();


        //associate services to categories
        $services->each(function ($service) {
            $service->categories()->attach([1, 2, 3]);
        });
    }
}
