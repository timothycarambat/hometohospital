<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\DonorItem;

class Donor extends Model
{
  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'city',
    'soc',
    'location',
    'hash',
  ];

  public static function getDonorByLocation($city, $soc){
    if( empty($city) || empty($soc)){
      return Donor::where('city', null);
    } else {
      return Donor::whereRaw("city LIKE '%{$city}%' AND soc LIKE '%{$soc}%'");
    }
  }

  function display_name(){
    $last_inital = $this->last_name[0];

    return "{$this->first_name} {$last_inital}.";
  }

  function items() {
    return $this->hasMany('App\DonorItem')->get();
  }

  function donate_items() {
    return DonorItem::where([
        ['donor_id', $this->id],
        ['type', 'supply']
      ])->get();
  }

  function create_items() {
    return DonorItem::where([
        ['donor_id', $this->id],
        ['type', 'create']
      ])->get();
  }
}
