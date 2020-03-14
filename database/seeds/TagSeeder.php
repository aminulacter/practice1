<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = Tag::create([
                'name' => 'Technology',
                'slug' => 'technology'
                ]);
        $tag2 = Tag::create([
                'name' => 'Garden',
                'slug' => 'Garden'
                ]);

        $tag3 = Tag::create([
                'name' => 'News',
                'slug' => 'News'
                ]);
        $tag4 = Tag::create([
                'name' => 'laravel',
                'slug' => 'laravel'
                ]);
    }
}
