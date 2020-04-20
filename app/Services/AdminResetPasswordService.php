<?php

namespace App\Services;

use App\Admin;
use App\Mail\SendAdminResetPasswordMail;
use App\PasswordReset;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AdminResetPasswordService
{
    /**
     * reset
     *
     * @param  mixed $request
     * @return void
     */
    public function reset(Request $request)
    {
        $user = $request->user;
        $email = $request->email;

        $adminUser = $this->findUser($user, $email);

        if ($adminUser) {
            $data = [
                'token' => $this->resetPassword($adminUser),
                'email' => $email,
            ];
            $this->sendEmail($data);
            return redirect()->route('admin.login')
                ->with('success','Foi enviado um email com o link para redefinição da senha.');
        }

        return back()
            ->withInput($request->only('user', 'email'))
            ->withErrors('Não foi encontrado um cadastro com o usuário e email informado');
    }

    /**
     * @param String $email
     * @return Application|ResponseFactory|Response|string
     */
    protected function resetPassword($adminUser)
    {
        $token = bin2hex(openssl_random_pseudo_bytes(64));

        PasswordReset::create([
            'id_admin' => $adminUser->id,
            'email' => $adminUser->email,
            'token' => $token,
        ]);

        return $token;
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
    /**
     * validateInputs
     *
     * @param  Request $request
     * @return void
     */
    public function validateUserAndEmail(Request $request)
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

    /**
     * sendEmail
     *
     * @param  array $data
     * @return void
     */
    protected function sendEmail(array $data)
    {
        Mail::to($data['email'])
            ->send(new SendAdminResetPasswordMail($data));
    }

    /**
     * updatePassword
     *
     * @param  Request $request
     * @return void
     */
    public function updatePassword(Request $request)
    {
        $passwordReset = PasswordReset::whereToken($request->token)->limit('1')->get();
        $userAdmin = Admin::find($passwordReset->first()->id_admin);

        $userAdmin->password = Hash::make($request->password);

        if ($userAdmin->save()) {
            return redirect()->route('admin.login')
                ->with('success','Senha alterada com sucesso.');
        }
    }

    /**
     * validatePassword
     *
     * @param  Request $request
     * @return void
     */
    public function validatePassword(Request $request)
    {
        $params = [
            'password' => 'required|string|between:8,16',
            'password_confirm' => 'same:password',
        ];

        $messages = [
            'password.required' => 'É necessário informar a senha',
            'password.string' => 'Formato de senha inválido',
            'password.between' => 'A senha precisa conter de 8 a 16 caracteres',

            'password_confirm.same' => 'As senhas precisam ser iguais nos dois campos',
        ];

        $request->validate($params, $messages);
    }
    
    /**
     * validateUpdatePasswordForm
     *
     * @param  String $token
     * @return boolean
     */
    public function validateUpdatePasswordForm(String $token)
    {
        $timeInMinutesForReset = 60;
        $passwordReset = PasswordReset::whereToken($token)->limit('1')->get();

        if ($passwordReset->count()) {
            $now = Carbon::now()->subMinutes($timeInMinutesForReset);
            $tokenCreatedAt = Carbon::create($passwordReset->first()->created_at);
    
            return $tokenCreatedAt->greaterThanOrEqualTo($now);
        }

        return false;
    }

}
