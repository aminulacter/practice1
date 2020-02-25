<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 4)->create();
        factory(App\User::class, 15)->create()->each(function ($u) {
            $u->represents()->save(factory(App\Vendor::class)->make());
        });
    }
}
