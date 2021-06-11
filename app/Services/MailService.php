<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MailService
{
    public static function send($to, Object $body)
    {
        try {

            Mail::to($to)->send($body);

            return true;

        } catch(\Exception $e) {

            Log::debug("Exception " . __CLASS__, [
                'msg' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

            return false;
        }
    }
}
