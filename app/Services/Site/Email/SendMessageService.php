<?php

namespace App\Services\Site\Email;

use App\Mail\SendMessageMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMessageService
{
    public function sendMessage(Request $request)
    {
        // $this->validateMessage($request);
        try {
            Mail::to(getenv('MAIL_FROM_ADDRESS'))
                ->send(new SendMessageMail($request));
            return json_encode(['success' => 'Mensagem enviada com sucesso']);

        } catch (Exception $ex) {
            return json_encode(['error' => 'Não foi possível enviar o email.']);
        }

    }

    protected function validateMessage(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
    }
}
