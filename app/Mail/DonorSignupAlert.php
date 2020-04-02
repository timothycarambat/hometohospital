<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonorSignupAlert extends Mailable
{
    use Queueable, SerializesModels;
    public $donor;

    public function __construct($donor) {
        $this->donor = $donor;
    }

    public function build() {
        return $this->view('mailers.systemNewDonor')
                    ->subject('HomeToHospital.org - New Signup')
                    ->with([
                        'subject' => 'HomeToHospital.org - New Signup',
                        'donor' => $this->donor,
                    ]);;
    }
}
