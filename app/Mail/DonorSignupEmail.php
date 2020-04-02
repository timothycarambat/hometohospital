<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonorSignupEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $donor;

    public function __construct($donor) {
        $this->donor = $donor;
    }

    public function build() {
        return $this->view('mailers.donorSignupEmail')
                    ->subject('HomeToHospital.org - Confirm Your Email')
                    ->with([
                        'subject' => 'HomeToHospital.org - Confirm Your Email',
                        'donor' => $this->donor,
                    ]);;
    }
}
