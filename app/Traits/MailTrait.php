<?php

namespace App\Traits;

use App\Mail\InquiryMail;
use App\Mail\PaymentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

trait MailTrait
{
    public function sendInquiryMail($data)
    {
        try {
            Mail::to($data['email'])->queue(new InquiryMail($data, 'user'));
            Mail::to('info@oneclicktourismllc.com')->queue(new InquiryMail($data, 'admin'));
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }

    }

    public function sendPaymentMail($data)
    {
        try {
            Mail::to($data['email'])->queue(new PaymentMail($data, 'user'));
            Mail::to('info@oneclicktourismllc.com')->queue(new PaymentMail($data, 'admin'));
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }

    }

}
