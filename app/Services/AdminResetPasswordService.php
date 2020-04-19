<?php

namespace App\Services;

use App\Admin;
use App\Mail\SendAdminResetPasswordMail;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\PasswordReset;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class AdminResetPasswordService
{
    public function reset(Request $request)
    {
        $this->validateInputs($request);

        $user = $request->user;
        $email = $request->email;

        $adminUser = $this->findUser($user, $email);

        if ($adminUser) {
            $data = [
                'token' => $this->resetPassword($email),
                'email' => $email,
            ];
            $this->sendEmail($data);
            return 'Fazer o redirecionamento para tela de login com a mensagem de sucesso';
        }

        return back()
            ->withInput($request->only('user', 'email'))
            ->withErrors('Não foi encontrado um cadastro com o usuário e email informado');
    }

    /**
     * @param String $email
     * @return Application|ResponseFactory|Response|string
     */
    protected function resetPassword(String $email)
    {
        $token = bin2hex(openssl_random_pseudo_bytes(64));

        try {
            PasswordReset::create([
                'email' => $email,
                'token' => $token,
            ]);
            return $token;
        } catch (Exception $ex) {
            return response('Falha ao gerar o token', '400');
        }
    }

    /**
     * @param String $user
     * @param String $email
     * @return Builder[]|Collection
     */
    protected function findUser(String $user, String $email)
    {
        $adminUser = Admin::where('user', $user)
            ->where('email', $email)
            ->limit('1')
            ->get();

        return $adminUser[0] ?? null;
    }

    /**
     * @param Request $request
     */
    protected function validateInputs(Request $request)
    {
        $params = [
            'user' => 'required|string',
            'email' => 'required|email',
        ];

        $messages = [
            'user.required' => 'É necessário informar o usuário',
            'email.required' => 'É necessário informar o email',
            'email.email' => 'Informe um email válido',
        ];

        $request->validate($params, $messages);
    }

    protected function sendEmail(array $data) {
//        Mail::to($data['email'])
        Mail::to('pedrodalvy@outlook.com')
            ->send(new SendAdminResetPasswordMail($data));
    }
}