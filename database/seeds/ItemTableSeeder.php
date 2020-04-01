<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemTableSeeder extends Seeder {
    public function run() {
      Item::truncate();
      $items = [
        'Face Masks',
        'Face Shields',
        'Gowns',
        'Headbands',
        'Shoe Covers',
      ];

      foreach($items as $item) {
        Item::create([
          'name' => $item,
        ]);
      }
    }
}
