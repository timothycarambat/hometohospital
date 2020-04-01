<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Donor;
use App\DonorItem;
use App\Utils;


class DonorController extends Controller
{
    public static function getEmail(Request $request) {
      $donor = Donor::find((int)$request->id);

      if (is_null($donor)) {
        $res = [
          'status' => false,
          'result' => null,
        ];
      } else {
        $res = [
          'status' => true,
          'result' => $donor->email,
        ];
      }

      return json_encode($res);
    }

    public static function new_donor(Request $request) {
      $v = Validator::make($request->all(), [
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'email' => 'unique:donors,email',
          'location' => 'required',
          'items' => 'required|array'
      ]);
      if ($v->fails()) {
          return json_encode([
            'status' => false,
            'msg' => $v->errors()->first(),
            'result' => null,
          ]);
      }

      // validate location with API
      $location = Utils::getLocation($request->location);
      if (!$location['status'] || empty($location['city']) || empty($location['soc'])) {
        return json_encode([
          'status' => false,
          'msg' => 'Location Input could not be validated.',
          'result' => $location
        ]);
      }

      $new_donor = Donor::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'city' => $location['city'],
        'soc' => $location['soc'],
        'location' => $request->location,
        'hash'=> str_random(40),
      ]);

      if (!$new_donor) {
        return json_encode([
          'status' => false,
          'msg' => 'User could not be created',
          'result' => null,
        ]);
      }

      // attach items to new donor
      foreach($request->items as $item) {
        $new_item = DonorItem::create([
          'donor_id' => $new_donor->id,
          'item_id' => (int)$item[0],
          'type' => $item[1],
        ]);

        // if new item cannot be made for whatever reason
        // delete the user to rollback the transaction
        if (!$new_item) {
          $new_donor->delete();

          return json_encode([
            'status' => false,
            'msg' => 'Donor Item Failed to be created',
            'result' => null,
          ]);
        }
      }

      return json_encode([
        'status' => true,
        'id' => $new_donor->id,
      ]);
    }
}
