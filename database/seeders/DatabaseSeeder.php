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
            [
                'name' => 'Lavazza Espresso',
                'description' => 'Premium ground coffee for rich espresso.',
                'price' => 9.99,
                'category' => 'Coffee',
                'img_url' => 'https://kaffekapslen.media/media/catalog/product/cache/e986fbef946fb9a322845c09204f8de5/l/a/lavazza-malet-qualita-oro-250g-01.jpg',
                'unit' => 'g',
                'volume' => 250
            ],
            [
                'name' => 'Senseo Classic',
                'description' => 'Coffee pads for Senseo.',
                'price' => 14.99,
                'category' => 'Coffee',
                'img_url' => 'https://kaffekapslen.media/media/catalog/product/cache/e986fbef946fb9a322845c09204f8de5/s/e/senseo-36-classic-0001.jpg',
                'unit' => 'pcs',
                'volume' => 36
            ],
            [
                'name' => 'Starbucks Blonde Espresso Roast',
                'description' => 'Whole bean coffee with smooth flavor.',
                'price' => 16.49,
                'category' => 'Coffee',
                'img_url' => 'https://media.power-cdn.net/images/h-b218a6aab6c6e4e9f1871ad835c4d747/products/2097703/2097703_3_1200x1200_w_g.jpg',
                'unit' => 'g',
                'volume' => 450
            ],
            [
                'name' => 'Twinings Earl Grey',
                'description' => 'Classic Earl Grey black tea bags.',
                'price' => 5.99,
                'category' => 'Tea',
                'img_url' => 'https://www.twinings.se/content/images/products/F12002-earl-grey-25p.jpg',
                'unit' => 'pcs',
                'volume' => 25
            ],
            [
                'name' => 'Yogi Green Tea',
                'description' => 'Organic green tea with lemon and ginger.',
                'price' => 4.79,
                'category' => 'Tea',
                'img_url' => 'https://kaffekapslen.media/media/catalog/product/cache/e986fbef946fb9a322845c09204f8de5/y/o/yogi-tea-green-tea-ginger-lemon-0013.jpg',
                'unit' => 'pcs',
                'volume' => 17
            ],
            [
                'name' => 'Tropicana Orange Juice',
                'description' => '100% pure squeezed orange juice.',
                'price' => 3.49,
                'category' => 'Juice',
                'img_url' => 'https://res.cloudinary.com/coopsverige/image/upload/e_sharpen,f_auto,fl_clip,fl_progressive,q_90,c_lpad,g_center,h_660,w_660/v1729152195/cloud/394664.jpg',
                'unit' => 'ml',
                'volume' => 900
            ],
            [
                'name' => 'V8 Vegetable Juice',
                'description' => 'Healthy blend of vegetable juices.',
                'price' => 4.29,
                'category' => 'Juice',
                'img_url' => 'https://images.albertsons-media.com/is/image/ABS/960208917-ECOM?$ng-ecom-pdp-mobile$&defaultImage=Not_Available',
                'unit' => 'fl oz',
                'volume' => 46
            ],
            [
                'name' => 'Coca Cola',
                'description' => 'Classic Coca Cola can.',
                'price' => 1.49,
                'category' => 'Soda',
                'img_url' => 'https://outofhome.se/media/catalog/product/cache/30/image/17f82f742ffe127f42dca9de82fb58b1/9/0/90042529_cocacola_original_burk.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Coca Cola Zero',
                'description' => 'Coca Cola Zero can.',
                'price' => 1.49,
                'category' => 'Soda',
                'img_url' => 'https://outofhome.se/media/catalog/product/cache/30/image/17f82f742ffe127f42dca9de82fb58b1/9/0/90042989_cocacola_zero_sugar_burk.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Pepsi',
                'description' => 'Refreshing Pepsi can.',
                'price' => 1.39,
                'category' => 'Soda',
                'img_url' => 'https://images.swedoffice.se/products/large/45251.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Pepsi Max',
                'description' => 'Refreshing Pepsi Max can.',
                'price' => 1.39,
                'category' => 'Soda',
                'img_url' => 'https://outofhome.se/media/catalog/product/cache/30/image/17f82f742ffe127f42dca9de82fb58b1/2/6/26568_pepsi_max_33cl_can_sleek_1.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Red Bull',
                'description' => 'Gives you wings.',
                'price' => 1.49,
                'category' => 'Energy Drink',
                'img_url' => 'https://cdn.barlife.dk/media/catalog/product/6/5/65009-ac38c9823fc741c0edcce9631c261e92.jpg?store=default&image-type=image',
                'unit' => 'ml',
                'volume' => 250
            ],
            [
                'name' => 'Monster Energy',
                'description' => 'The classic energy drink.',
                'price' => 2.29,
                'category' => 'Energy Drink',
                'img_url' => 'https://www.buttericks.se/cdn-cgi/image/quality=90,format=auto/https://www.buttericks.se/media/catalog/product/1/0/105060-energidryck-monster-energy-gron-50-cl.jpg?store=se&image-type=image',
                'unit' => 'cl',
                'volume' => 50
            ],
            [
                'name' => 'Gatorade Lemon Lime',
                'description' => 'Electrolyte sports drink.',
                'price' => 1.99,
                'category' => 'Sports Drink',
                'img_url' => 'https://www.cooperscandy.com/resource/u4DN/dvg/Nkt3vYMgafO/prod/91997-2025.jpg',
                'unit' => 'cl',
                'volume' => 50
            ],
            [
                'name' => 'Evian Natural Spring Water',
                'description' => 'Refreshing natural spring water.',
                'price' => 1.69,
                'category' => 'Water',
                'img_url' => 'https://m.media-amazon.com/images/I/51pxfK6d2YL.jpg',
                'unit' => 'cl',
                'volume' => 50
            ],
            [
                'name' => 'Heineken Beer',
                'description' => '5% ABV. Premium lager beer.',
                'price' => 1.99,
                'category' => 'Alcohol',
                'img_url' => 'https://www.dryckeslaget.com/tuotekuvat/800x800/missing_image-2.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Swiss Miss Hot Cocoa',
                'description' => 'Rich hot chocolate with marshmallows.',
                'price' => 3.99,
                'category' => 'Hot Chocolate',
                'img_url' => 'https://m.media-amazon.com/images/I/81ZqVUJO6xL.jpg',
                'unit' => 'pcs',
                'volume' => 8
            ],
            [
                'name' => 'Illy Ground Espresso',
                'description' => 'Smooth and balanced ground espresso coffee.',
                'price' => 11.99,
                'category' => 'Coffee',
                'img_url' => 'https://m.media-amazon.com/images/I/81u8fAt0T+L.jpg',
                'unit' => 'g',
                'volume' => 250
            ],
            [
                'name' => 'Nescafé Gold Instant Coffee',
                'description' => 'Premium instant coffee for a rich flavor.',
                'price' => 7.99,
                'category' => 'Coffee',
                'img_url' => 'https://www.fresh-store.eu/11982-large_default/nescafe-gold-instant-coffee-200g.jpg',
                'unit' => 'g',
                'volume' => 200
            ],
            [
                'name' => 'Lipton Green Tea',
                'description' => 'Refreshing green tea with a smooth taste.',
                'price' => 3.99,
                'category' => 'Tea',
                'img_url' => 'https://www.papperskungen.se/images/asset.6396526.jpg',
                'unit' => 'pcs',
                'volume' => 25
            ],
            [
                'name' => 'Simply Apple Juice',
                'description' => '100% pure apple juice, never from concentrate.',
                'price' => 4.29,
                'category' => 'Juice',
                'img_url' => 'https://images.cdn.retail.brookshires.com/zoom/98298f12-27c5-4a3a-aec2-917b325c9dfa.jpeg',
                'unit' => 'ml',
                'volume' => 1500
            ],
            [
                'name' => 'Sprite',
                'description' => 'Lemon-lime flavored soda with no caffeine.',
                'price' => 1.39,
                'category' => 'Soda',
                'img_url' => 'https://gottebiten.se/media/catalog/product/cache/image/1000x1320/e9c3970ab036de70892d86c6d221abfe/s/p/sprite-burk_1.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Dr Pepper',
                'description' => 'Unique blend of 23 flavors.',
                'price' => 1.49,
                'category' => 'Soda',
                'img_url' => 'https://store.nana.co/_next/image?url=https%3A%2F%2Fcdn.nana.sa%2Fcatalog%2Flarge%2F9%2Fa%2F8%2Fc%2F9a8c51333628504233ae93c6ed3266af22fbdb73_8435185944009.jpg&w=1200&q=75',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Nocco Caribbean',
                'description' => 'BCAA energy drink with a tropical taste.',
                'price' => 2.99,
                'category' => 'Energy Drink',
                'img_url' => 'https://www.sportkost.se/pub_images/original/nocco_bcaa_caribbean_330ml.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Powerade Mountain Blast',
                'description' => 'Electrolyte sports drink with a berry flavor.',
                'price' => 2.49,
                'category' => 'Sports Drink',
                'img_url' => 'https://www.proteinbolaget.se/img/bilder/artiklar/zoom/PB-897_2.jpg?m=1614240219',
                'unit' => 'ml',
                'volume' => 500
            ],
            [
                'name' => 'Fiji Natural Artesian Water',
                'description' => 'Premium water with a soft and smooth taste.',
                'price' => 2.29,
                'category' => 'Water',
                'img_url' => 'https://m.media-amazon.com/images/I/61kGuZKqMcL.jpg',
                'unit' => 'ml',
                'volume' => 1000
            ],
            [
                'name' => 'Heineken 0.0',
                'description' => '0% ABV. Non-alcoholic beer with the same great Heineken taste.',
                'price' => 1.99,
                'category' => 'Non-Alcoholic',
                'img_url' => 'https://m.media-amazon.com/images/I/61jd8399FEL._SL1500_.jpg',
                'unit' => 'ml',
                'volume' => 330
            ],
            [
                'name' => 'Corona Extra',
                'description' => '4.5% ABV. Crisp and refreshing Mexican beer.',
                'price' => 2.49,
                'category' => 'Alcohol',
                'img_url' => 'https://www.dryckeslaget.com/tuotekuvat/1200x1200/corona.png',
                'unit' => 'ml',
                'volume' => 355
            ],
            [
                'name' => 'Jack Daniel’s Tennessee Whiskey',
                'description' => '40% ABV. Smooth and mellow Tennessee whiskey.',
                'price' => 24.99,
                'category' => 'Alcohol',
                'img_url' => 'https://www.gourmetencasa-tcm.com/17699-large_default/jack-daniel-s-70cl.jpg',
                'unit' => 'ml',
                'volume' => 700
            ],
            [
                'name' => 'Cadbury Drinking Chocolate',
                'description' => 'Classic rich and creamy hot chocolate mix.',
                'price' => 5.99,
                'category' => 'Hot Chocolate',
                'img_url' => 'https://m.media-amazon.com/images/I/61ZbTmemAoL.jpg',
                'unit' => 'g',
                'volume' => 250
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
                'unit' => $product['unit'],
                'volume' => $product['volume']
            ]);
        }
    }
}
