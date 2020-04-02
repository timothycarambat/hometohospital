<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonorSignupEmail;
use App\Mail\DonorSignupAlert;

use App\Donor;
use Log;

class DonorSignupListener {
    public function handle(Donor $donor) {
      Log::info("---- New Donor {$donor->first_name} {$donor->last_name} Email Sent ----");
      Mail::to($donor->email)->send(new DonorSignupEmail($donor));

      if(isset($_ENV['SEND_SIGNUP_EMAIL'])) {
        Log::info("---- System Signup Email Sent ----");
        Mail::to($_ENV['SUPPORT_EMAIL'])->send(new DonorSignupAlert($donor));
      }

    }
}
