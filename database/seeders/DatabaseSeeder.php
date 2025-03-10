<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Max',
            'email' => 'max@beverly.com',
            'password' => '123',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Sandra',
            'email' => 'sandra@beverly.com',
            'password' => '123',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Rune',
            'email' => 'rune@beverly.com',
            'password' => '123',
            'role' => 'employee'
        ]);

        User::factory(10)->create();

        $categories = Category::factory(10)->create();

        Product::factory(50)->create(['category_id' => $categories->random()->id]);
    }
}
