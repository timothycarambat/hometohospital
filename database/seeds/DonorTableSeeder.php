<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Donor;
use App\Item;
use App\DonorItem;

class DonorTableSeeder extends Seeder
{
    public function run(){
      Donor::truncate();
      DonorItem::truncate();


      $locations = [
        ['New York City','New York'],
        ['Irvine','California'],
        ['Los Angeles','California'],
        ['New Orleans','Louisiana'],
      ];
      $items = Item::get()->toArray();

      for ($x = 0; $x <= 1000; $x++) {
          $randLocation = $locations[array_rand($locations)];
          $location = join($randLocation, ' ,');
          $faker = Faker::create();
          $name = explode(' ', $faker->name);

          $donor = Donor::create([
            'first_name' => $name[0],
            'last_name' => $name[1],
            'email' => str_random(24)."@mail.com",
            'bio' => $faker->randomDigit < 3 ? $faker->paragraph($nbSentences = 3, $variableNbSentences = true) : null,
            'city' => $randLocation[0],
            'soc' => $randLocation[1],
            'location' => $location,
            'hash' => str_random(40),
            'confirmed' => true,
          ]);


          for ($y = 0; $y <= 6; $y++) {
            $random_item = $items[array_rand($items)];
            DonorItem::create([
              'donor_id' => $donor->id,
              'item_id' => $random_item['id'],
              'type' => $y < 3 ? 'create' : 'supply',
            ]);
          }
      }
    }
}
