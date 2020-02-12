<?php

use Illuminate\Database\Seeder;
use App\LicenseType;
use Carbon\Carbon;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        LicenseType::insert([
            ['Type' => 'Single Site License', 'ratio' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['Type' => '2 Site License', 'ratio' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['Type' => 'Multi Site License', 'ratio' => 3, 'created_at' => $now, 'updated_at' => $now],
         
        ]);
    }
}
