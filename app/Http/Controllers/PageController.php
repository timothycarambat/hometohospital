<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

use App\Donor;
use App\Utils;

class PageController extends Controller
{
  public function home(Request $request) {
    if (Donor::count() == 0){
      return Redirect::to('/donors');
    }

    $city = is_null($request->city) ? Donor::first()->city : $request->city;
    $soc = is_null($request->soc) ? Donor::first()->soc : $request->soc;
    $donors = Donor::getDonorByLocation($city, $soc);

    return view('home')->with([
      'page' => 'home',
      'city' => $city,
      'soc' => $soc,
      'donor_count' => $donors->count(),
      'donors' => $donors->paginate(25),
    ]);
  }

  public function search(Request $request) {
    $city = '';
    $soc = '';

    if (!is_null($request->lookup)) {
      $location_details = Utils::getLocation($request->lookup);
      if($location_details['status']) {
        $city = $location_details['city'];
        $soc = $location_details['soc'];
      }
    }
    $donors = Donor::getDonorByLocation($city, $soc);

    return view('home')->with([
      'page' => 'home',
      'city' => $city,
      'soc' => $soc,
      'donor_count' => $donors->count(),
      'donors' => $donors->paginate(25),
    ]);
  }

  public function locations(Request $request) {
    $locations = Utils::getUniqueLocations();

    return view('locations')->with([
      'page' => 'locations',
      'location_count' => count($locations),
      'locations' => $locations,
    ]);
  }

  public function donors(Request $request) {
    $donors = Donor::OrderBy('last_name');

    return view('donors')->with([
      'page' => 'donors',
      'donor_count' => $donors->count(),
      'donors' => $donors->paginate(50),
    ]);
  }

  public function donor_details(Request $request) {
    $donor = Donor::find($request->id);

    return view('donor_detail')->with([
      'page' => 'donor_detail',
      'donor' => $donor,
    ]);
  }

  public function new_donor(Request $request) {
    return view('donor_new')->with([
      'page' => 'donor_new'
    ]);
  }

  public function about(Request $request) {
    return view('about')->with([
      'page' => 'about'
    ]);
  }
}
