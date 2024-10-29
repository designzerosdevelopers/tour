<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $recever;

    public function __construct($data, $recever)
    {
        $this->data = $data;
        $this->recever = $recever;
    }

    public function build()
    {
        $subject = ($this->recever == 'admin') ? 'Reserved new paid inquiry' : 'Your payment and inquiry sent successfully';
        $this->data['heading'] = $subject;

        return $this->view('adminpanel.emails.payment')
            ->with('data', $this->data)
            ->subject($subject);
    }
}
