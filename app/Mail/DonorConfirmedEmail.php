<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonorConfirmedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $donor;

    public function __construct($donor) {
        $this->donor = $donor;
    }

    public function build() {
        return $this->view('mailers.donorConfirmedEmail')
                    ->subject('HomeToHospital.org - Your Profile is Live!')
                    ->with([
                        'subject' => 'HomeToHospital.org - Your Profile is Live!',
                        'donor' => $this->donor,
                    ]);;
    }
}
