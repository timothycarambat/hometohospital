<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Redirect;

use App\Donor;
use App\Utils;

class PageController extends Controller
{
  public function home(Request $request) {
    if (Donor::where('confirmed', true)->count() == 0){
      return Redirect::to('/donors');
    }

    $city = is_null($request->city) ? Donor::where('confirmed', true)->first()->city : $request->city;
    $soc = is_null($request->soc) ? Donor::where('confirmed', true)->first()->soc : $request->soc;
    $donors = Donor::getDonorByLocation($city, $soc);

    return view('home')->with([
      'page' => 'home',
      'city' => $city,
      'soc' => $soc,
      'donor_count' => $donors->count(),
      'donors' => $donors->paginate(12),
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
      'donors' => $donors->paginate(12),
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
    $donors = Donor::where('confirmed', true)->OrderBy('last_name');

    return view('donors')->with([
      'page' => 'donors',
      'donor_count' => $donors->count(),
      'donors' => $donors->paginate(12),
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

  public function confirmed(Request $request) {
    $donor = Donor::where('hash', $request->hash)->get();

    if ($donor->count() > 0) {
      $donor = $donor[0];
      $donor->update(['confirmed' => true]);
      Event::fire('App\Events\DonorConfirmed', $donor);
    } else {
      return Redirect::to('/404');
    }

    return view('confirmed')->with([
      'page' => 'confirmed',
      'donor' => $donor,
    ]);
  }

  public function complete(Request $request) {
    $donor = Donor::find($request->id);

    return view('signup_complete')->with([
      'page' => 'signup_complete',
      'donor' => $donor,
    ]);
  }

  public function donor_edit(Request $request) {
    $donor = Donor::where('hash', $request->hash)->get();
    if ($donor->count() == 0) {
      return Redirect::to('/404');
    }

    return view('donor_edit')->with([
      'page' => 'donor_edit',
      'donor' => $donor->first(),
    ]);
  }
}
