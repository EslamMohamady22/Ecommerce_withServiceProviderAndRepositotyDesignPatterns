<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create([
        //     'type' => 'admin',
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => '123456123',
        // ]);
        User::factory(10)->create();
        // Category::factory(5)->create();
        Product::factory(15)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
