<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 15)->create();
        // factory(App\Vendor::class, 11)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
       
        $this->call(CommentSeeder::class);
        $this->call(TagSeeder::class);
    }
}
