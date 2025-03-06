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

        $products = [
            // Coffee
            [
                'name' => 'Lavazza Espresso',
                'description' => '250g. Premium ground coffee for rich espresso.',
                'price' => 9.99,
                'category' => 'Coffee',
                'img_url' => 'https://kaffekapslen.media/media/catalog/product/cache/e986fbef946fb9a322845c09204f8de5/l/a/lavazza-malet-qualita-oro-250g-01.jpg'
            ],
            [
                'name' => 'Senseo Classic',
                'description' => '36pcs. Coffee pads for Senseo.',
                'price' => 14.99,
                'category' => 'Coffee',
                'img_url' => 'https://kaffekapslen.media/media/catalog/product/cache/e986fbef946fb9a322845c09204f8de5/s/e/senseo-36-classic-0001.jpg'
            ],
            [
                'name' => 'Starbucks Blonde Espresso Roast',
                'description' => '450g. Whole bean coffee with smooth flavor.',
                'price' => 16.49,
                'category' => 'Coffee',
                'img_url' => 'https://media.power-cdn.net/images/h-b218a6aab6c6e4e9f1871ad835c4d747/products/2097703/2097703_3_1200x1200_w_g.jpg'
            ],

            // Tea
            [
                'name' => 'Twinings Earl Grey',
                'description' => '25pcs. Classic Earl Grey black tea bags.',
                'price' => 5.99,
                'category' => 'Tea',
                'img_url' => 'https://www.twinings.se/content/images/products/F12002-earl-grey-25p.jpg'
            ],
            [
                'name' => 'Yogi Green Tea',
                'description' => '17pcs. Organic green tea with lemon and ginger.',
                'price' => 4.79,
                'category' => 'Tea',
                'img_url' => 'https://kaffekapslen.media/media/catalog/product/cache/e986fbef946fb9a322845c09204f8de5/y/o/yogi-tea-green-tea-ginger-lemon-0013.jpg'
            ],

            // Juice
            [
                'name' => 'Tropicana Orange Juice',
                'description' => '900ml. 100% pure squeezed orange juice.',
                'price' => 3.49,
                'category' => 'Juice',
                'img_url' => 'https://res.cloudinary.com/coopsverige/image/upload/e_sharpen,f_auto,fl_clip,fl_progressive,q_90,c_lpad,g_center,h_660,w_660/v1729152195/cloud/394664.jpg'
            ],
            [
                'name' => 'V8 Vegetable Juice',
                'description' => '1.4l. Healthy blend of vegetable juices.',
                'price' => 4.29,
                'category' => 'Juice',
                'img_url' => 'https://images.albertsons-media.com/is/image/ABS/960208917-ECOM?$ng-ecom-pdp-mobile$&defaultImage=Not_Available'
            ],

            // Soda
            [
                'name' => 'Coca Cola',
                'description' => '330ml. Classic Coca Cola can.',
                'price' => 1.49,
                'category' => 'Soda',
                'img_url' => 'https://outofhome.se/media/catalog/product/cache/30/image/17f82f742ffe127f42dca9de82fb58b1/9/0/90042529_cocacola_original_burk.jpg'
            ],
            [
                'name' => 'Coca Cola Zero',
                'description' => '330ml. Coca Cola Zero can.',
                'price' => 1.49,
                'category' => 'Soda',
                'img_url' => 'https://outofhome.se/media/catalog/product/cache/30/image/17f82f742ffe127f42dca9de82fb58b1/9/0/90042989_cocacola_zero_sugar_burk.jpg'
            ],
            [
                'name' => 'Pepsi',
                'description' => '330ml. Refreshing Pepsi can.',
                'price' => 1.39,
                'category' => 'Soda',
                'img_url' => 'https://images.swedoffice.se/products/large/45251.jpg'
            ],
            [
                'name' => 'Pepsi Max',
                'description' => '330ml. Refreshing Pepsi Max can.',
                'price' => 1.39,
                'category' => 'Soda',
                'img_url' => 'https://outofhome.se/media/catalog/product/cache/30/image/17f82f742ffe127f42dca9de82fb58b1/2/6/26568_pepsi_max_33cl_can_sleek_1.jpg'
            ],

            // Energy Drink
            [
                'name' => 'Red Bull',
                'description' => '250ml. Gives you wings.',
                'price' => 1.49,
                'category' => 'Energy Drink',
                'img_url' => 'https://cdn.barlife.dk/media/catalog/product/6/5/65009-ac38c9823fc741c0edcce9631c261e92.jpg?store=default&image-type=image'
            ],
            [
                'name' => 'Monster Energy',
                'description' => '50cl. The classic energy drink.',
                'price' => 2.29,
                'category' => 'Energy Drink',
                'img_url' => 'https://www.buttericks.se/cdn-cgi/image/quality=90,format=auto/https://www.buttericks.se/media/catalog/product/1/0/105060-energidryck-monster-energy-gron-50-cl.jpg?store=se&image-type=image'
            ],

            // Sports Drink
            [
                'name' => 'Gatorade Lemon Lime',
                'description' => '50cl. Electrolyte sports drink.',
                'price' => 1.99,
                'category' => 'Sports Drink',
                'img_url' => 'https://www.cooperscandy.com/resource/u4DN/dvg/Nkt3vYMgafO/prod/91997-2025.jpg'
            ],

            // Water
            [
                'name' => 'Evian Natural Spring Water',
                'description' => '50cl. Refreshing natural spring water.',
                'price' => 1.69,
                'category' => 'Water',
                'img_url' => 'https://m.media-amazon.com/images/I/51pxfK6d2YL.jpg'
            ],

            // Alcohol
            [
                'name' => 'Heineken Beer',
                'description' => '330ml. Premium lager beer.',
                'price' => 1.99,
                'category' => 'Alcohol',
                'img_url' => 'https://www.dryckeslaget.com/tuotekuvat/800x800/missing_image-2.jpg'
            ],

            // Hot Chocolate
            [
                'name' => 'Swiss Miss Hot Cocoa',
                'description' => '8pcs. Rich hot chocolate with marshmallows.',
                'price' => 3.99,
                'category' => 'Hot Chocolate',
                'img_url' => 'https://m.media-amazon.com/images/I/81ZqVUJO6xL.jpg'
            ],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();

            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category_id' => $category->id ?? null,
                'img_url' => $product['img_url'],
            ]);
        }
    }
}
