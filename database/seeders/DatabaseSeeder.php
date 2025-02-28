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

        // User::factory(10)->create();

        $categories = [
            [
                'name' => 'Coffee',
                'description' => 'Ground coffee, whole beans, single-serve pods and instant coffee.'
            ],
            [
                'name' => 'Tea',
                'description' => 'Black, green, red, white, herbal etc. Tea bags and loose leaf options.'
            ],
            [
                'name' => 'Juice',
                'description' => 'Fruit and vegetable juices, blends and concentrates.'
            ],
            [
                'name' => 'Soda',
                'description' => 'Carbonated soft drinks.'
            ],
            [
                'name' => 'Energy Drink',
                'description' => 'Beverages designed to boost energy and alertness.'
            ],
            [
                'name' => 'Sports Drink',
                'description' => 'Drinks formulated to hydrate and replenish electrolytes.'
            ],
            [
                'name' => 'Water',
                'description' => 'Bottled water, including spring, mineral, and flavored varieties.'
            ],
            [
                'name' => 'Alcohol',
                'description' => 'Wine, beer, spirits and related mixers.'
            ],
            [
                'name' => 'Non-Alcoholic',
                'description' => 'Non-alcoholic alternatives for regular wine, beer, spirits and related mixers.'
            ],
            [
                'name' => 'Hot Chocolate',
                'description' => 'Cocoa mixes with dairy or plant-based milk.'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description']
            ]);
        }

        $categories = Category::all(); // have to get them after they're in the database to make them elquent to use them for randomizing products

        Product::factory(50)->create([
            'category_id' => function () use ($categories) {
                return $categories->random()->id;
            }
        ]);
    }
}
