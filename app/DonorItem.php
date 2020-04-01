<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorItem extends Model
{
    protected $fillable = [
      'donor_id',
      'item_id',
      'type',
    ];


    public function item() {
      return $this->belongsTo('App\Item');
    }
}
