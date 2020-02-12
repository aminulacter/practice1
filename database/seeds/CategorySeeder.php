<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Category::insert([
            ['name' => 'Plugin', 'slug' => 'plugin', 'logo' => 'lnr lnr-book', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'WordPress', 'slug' => 'word-press', 'logo' => 'fab fa-wordpress', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Site Template', 'slug' => 'site-template', 'logo' =>'fab fa-html5', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PSD Template', 'slug' => 'psd-template', 'logo' => 'lnr lnr-book', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Joomla', 'slug' => 'joomla', 'logo' => 'fab fa-joomla', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Laravel', 'slug' => 'laravel', 'logo' => 'fab fa-laravel', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vue', 'slug' => 'vue', 'created_at' => $now, 'logo' => 'fab fa-vuejs', 'updated_at' => $now],
        ]);
    }
}
