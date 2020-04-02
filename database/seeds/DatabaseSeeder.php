<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if($_ENV['APP_ENV'] == 'local') {
          $this->call([
            ItemTableSeeder::class,
            DonorTableSeeder::class,
          ]);
        } else {
          $this->call([
            ItemTableSeeder::class,
          ]);
        }

    }
}
