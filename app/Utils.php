<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

use App\Donor;

class Utils extends Model
{
    public static function getLocation($searchTerm) {
      $client = new \GuzzleHttp\Client(['base_uri' => 'https://nominatim.openstreetmap.org']);
      $types = [
        'way' => 'W',
        'node' => 'N',
        'relation' => 'R'
      ];
      $result = [
        'status' => false,
        'city' => null,
        'soa' => null,
      ];

      try {
        $response = $client->request('GET', "/search?q={$searchTerm}&format=json");
        if ($response->getBody()) {
          $data = json_decode($response->getBody())[0];
          $osm_id = $data->osm_id;
          $type = $types[$data->osm_type];

          $response = $client->request('GET', "/lookup?osm_ids={$type}{$osm_id}&format=json");
          if ($response->getBody()) {
            $data = json_decode($response->getBody())[0];
            $result = [
              'status' => true,
              'city' => property_exists($data->address, 'city') ? $data->address->city : '',
              'soc' => $data->address->state,
            ];
          }
        }
      } catch (\Exception $e) {
        $result['error'] = $e->getMessage();
      }

      return $result;
    }

    public static function getUniqueLocations() {
      $collection = Donor::select('location')->distinct()->get();
      $grouped = $collection->groupBy(function ($item, $key) {
          $letter = $item->location[0];
          if (ctype_alpha($letter)) {
              return $letter;
          }
          return '#';
      })->toArray();
      ksort($grouped);

      return $grouped;
    }
}
