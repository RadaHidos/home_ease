<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User :: create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password'),
            'is_admin'=>true,
        ]);


        User :: create([
            'name'=>'User',
            'email'=>'user@user.com',
            'password'=>Hash::make('password'),
            'is_admin'=>false,
        ]);
  
    $users = User::factory(5)->create();

    $categories = Category::factory(6)->create();

    $services = Service::factory(10)->make()->each(function ($service) use ($users) {
        $service->author_id = $users->random()->id;
        $service->save();
    });

    $services->each(function ($service) use ($categories) {
        $service->categories()->attach(
            $categories->random(random_int(1, 2))->pluck('id')->toArray()
        );
    });

    Comment::factory(20)->make()->each(function ($comment) use ($services) {
        $comment->service_id = $services->random()->id;
        $comment->save();
    });
    }
}
