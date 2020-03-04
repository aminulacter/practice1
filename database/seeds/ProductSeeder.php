<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) {
            $product = Product::create([
                'name' => 'Laptop ' . $i,
                'slug' => 'laptop-' . $i,
                'user_id'=> rand(5, 15),
                'details' => [13, 14, 15][array_rand([13, 14, 15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32GB RAM',
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/laptop-' . $i . '.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(1);
        }
        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);
        // Desktops
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Desktop ' . $i,
                'slug' => 'desktop-' . $i,
                'user_id' =>  rand(5, 15),
                'details' => [24, 25, 27][array_rand([24, 25, 27])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32GB RAM',
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/desktop-' . $i . '.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(2);
        }
        // Phones
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Phone ' . $i,
                'slug' => 'phone-' . $i,
                'user_id' =>  rand(5, 15),
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [7, 8, 9][array_rand([7, 8, 9])] . ' inch screen, 4GHz Quad Core',
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/phone-' . $i . '.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(3);
        }
        // Tablets
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Tablet ' . $i,
                'slug' => 'tablet-' . $i,
                'user_id' =>  rand(5, 15),
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [10, 11, 12][array_rand([10, 11, 12])] . ' inch screen, 4GHz Quad Core',
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/tablet-' . $i . '.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(4);
        }
        // TVs
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'TV ' . $i,
                'slug' => 'tv-' . $i,
                'user_id' => rand(5, 15),
                'details' => [46, 50, 60][array_rand([7, 8, 9])] . ' inch screen, Smart TV, 4K',
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/tv-' . $i . '.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(5);
        }
        // Cameras
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Camera ' . $i,
                'slug' => 'camera-' . $i,
                'user_id' => rand(5, 15),
                'details' => 'Full Frame DSLR, with 18-55mm kit lens.',
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/camera-' . $i . '.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(6);
        }
        // Appliances
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Appliance ' . $i,
                'slug' => 'appliance-' . $i,
                'user_id' => rand(5, 15),
                'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, dolorum!',
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'products/dummy/appliance-' . $i . '.jpg',
                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
            ])->categories()->attach(7);
        }
        // Select random entries to be featured
        Product::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53, 61, 69, 73, 80])->update(['featured' => true]);

        $products = Product::all();
        foreach ($products as $product) {
            for ($i = 0; $i < 5; $i++) {
                $product->faqs()->save(factory(App\Question::class)->make());
            }
        }
        foreach ($products as $product) {
            $license_type1=["Single Site License", "2 Site License", "MultipleSiteLicense"];
            $price = [10, 20, 30];
            for ($i=0; $i <3; $i++) {
                $license_type = new App\LicenseType(['type' => $license_type1[$i], 'price' => $price[$i]]);
                $product->licences_types()->save($license_type);
            }
        }
    }
}
