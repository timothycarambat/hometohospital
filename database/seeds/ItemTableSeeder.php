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
        'Medical Gloves',
        'Goggles/Eyewear',
        'Scrubs',
        'Accessories',
        'Tech. Devices',
        'Cleaning Supplies',
        'Other'
      ];

      foreach($items as $item) {
        Item::create([
          'name' => $item,
        ]);
      }
    }
}
