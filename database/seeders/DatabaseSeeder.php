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
                'name' => 'Nespresso Pods',
                'description' => 'Nespresso compatible coffee pods.',
                'price' => 14.99,
                'category' => 'Coffee',
                'img_url' => 'https://www.nespresso.com/ecom/medias/sys_master/public/11656694722590.png'
            ],
            [
                'name' => 'Starbucks Blonde Roast',
                'description' => 'Whole bean coffee with smooth flavor.',
                'price' => 11.49,
                'category' => 'Coffee',
                'img_url' => 'https://www.starbucksathome.com/nl/sites/default/files/2023-02/Product%20Shot%20-%20Blonde%20Espresso%20Roast%20-%20Ground%20-%20200g.png'
            ],

            // Tea
            [
                'name' => 'Twinings Earl Grey',
                'description' => 'Classic Earl Grey black tea bags.',
                'price' => 5.99,
                'category' => 'Tea',
                'img_url' => 'https://www.twiningsusa.com/cdn/shop/products/EarlGreyBox.png'
            ],
            [
                'name' => 'Yogi Green Tea',
                'description' => 'Organic green tea with lemon and ginger.',
                'price' => 4.79,
                'category' => 'Tea',
                'img_url' => 'https://www.yogiproducts.com/images/uploads/products/gtlemon.png'
            ],

            // Juice
            [
                'name' => 'Tropicana Orange Juice',
                'description' => '100% pure squeezed orange juice.',
                'price' => 3.49,
                'category' => 'Juice',
                'img_url' => 'https://images.ctfassets.net/oggad6svuzkv/4QyEXUbSWhvCvCYo2sQGMY/41dc7d2c7333390c74c9de93777c515a/100-ORANGE-JUICE-52oz.png'
            ],
            [
                'name' => 'V8 Vegetable Juice',
                'description' => 'Healthy blend of vegetable juices.',
                'price' => 4.29,
                'category' => 'Juice',
                'img_url' => 'https://images.albertsons-media.com/is/image/ABS/108110076?$ng-ecom-pdp-mobile$&defaultImage=Not_Available'
            ],

            // Soda
            [
                'name' => 'Coca Cola',
                'description' => 'Classic 330ml Coca Cola can.',
                'price' => 1.49,
                'category' => 'Soda',
                'img_url' => 'https://www.coca-cola.com/content/dam/one/central/gb/en/homepage-hero-desktop.png'
            ],
            [
                'name' => 'Pepsi',
                'description' => 'Refreshing Pepsi can.',
                'price' => 1.39,
                'category' => 'Soda',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/a/ae/Pepsi_can_logo.svg'
            ],

            // Energy Drink
            [
                'name' => 'Red Bull',
                'description' => 'Gives you wings.',
                'price' => 2.49,
                'category' => 'Energy Drink',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/en/f/f3/RedBullCan150ml.png'
            ],
            [
                'name' => 'Monster Energy',
                'description' => 'The classic energy drink.',
                'price' => 2.29,
                'category' => 'Energy Drink',
                'img_url' => 'https://m.media-amazon.com/images/I/61MkU+DiXLL._AC_SL1500_.jpg'
            ],

            // Sports Drink
            [
                'name' => 'Gatorade Lemon Lime',
                'description' => 'Electrolyte sports drink.',
                'price' => 1.99,
                'category' => 'Sports Drink',
                'img_url' => 'https://images.albertsons-media.com/is/image/ABS/120380011?$ng-ecom-pdp-desktop$&defaultImage=Not_Available'
            ],

            // Water
            [
                'name' => 'Evian Natural Spring Water',
                'description' => 'Refreshing natural spring water.',
                'price' => 1.69,
                'category' => 'Water',
                'img_url' => 'https://www.evian.com/media/349/files/productpackshot/classic-range/evian-500ml-natural-mineral-water.png'
            ],

            // Alcohol
            [
                'name' => 'Heineken Beer',
                'description' => 'Premium lager beer.',
                'price' => 2.99,
                'category' => 'Alcohol',
                'img_url' => 'https://www.heineken.com/media-eu/images/heineken-com/product/330ml.png'
            ],

            // Hot Chocolate
            [
                'name' => 'Swiss Miss Hot Cocoa',
                'description' => 'Rich hot chocolate with marshmallows.',
                'price' => 3.99,
                'category' => 'Hot Chocolate',
                'img_url' => 'https://www.swissmiss.com/sites/swsm/files/2021-10/SwissMissMilkHotCocoa.jpg'
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
