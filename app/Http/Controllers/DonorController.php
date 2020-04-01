<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Donor;

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
}
