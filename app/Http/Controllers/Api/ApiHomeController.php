<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MailRequest;
use App\Mail\Mail;
use App\Services\MailService;
use Validator;

class ApiHomeController extends ApiBaseController
{

    public function __construct()
    {
        //
    }

    public function sendMail()
    {
        try {

            $validatorRequest = new MailRequest();
            $validator = Validator::make(request()->all(), $validatorRequest->rules(), $validatorRequest->messages());

            if ($validator->fails()) {
                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $mail = MailService::send(request()->get('email'), new Mail(request()->all()));

            if (!$mail) {
                return $this->sendBadRequest('Server Error.', ['email' => 'Não foi possível enviar email']);
            }

            return $this->sendResponse([], 'Email enviado com sucesso');

        } catch (\Exception $e) {

            return $this->sendError('Server Error.', $e);

        }
    }
}
