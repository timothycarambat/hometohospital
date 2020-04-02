<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonorConfirmedEmail;

use App\Donor;
use Log;

class DonorConfirmedListener {
    public function handle(Donor $donor) {
      Log::info("---- Confirmed Donor {$donor->first_name} {$donor->last_name} Email Sent ----");
      Mail::to($donor->email)->send(new DonorConfirmedEmail($donor));
    }
}
