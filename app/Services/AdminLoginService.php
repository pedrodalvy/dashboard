<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginService
{

    /**
     * login
     *
     * @param  Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attempt($request)) {
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()
            ->withInput($request->only('user', 'remember'))
            ->withErrors('Login ou senha inválidos');
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->intended(route('admin.login'))
            ->with('info', 'Logout realizado com sucesso.');
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     * @return void
     *
     */
    protected function validateLogin(Request $request)
    {
        $params = [
            'user' => 'required|string',
            'password' => 'required|string',
        ];

        $messages = [
            'user.required' => 'É nessessário informar o usuário',
            'password.required' => 'É necessário informar a senha',
        ];

        $request->validate($params, $messages);
    }

    /**
     * Attempt to login with credentials
     *
     * @param Request $request
     * @return mixed
     */
    protected function attempt(Request $request)
    {
        $credentials = [
            'user' => $request->user,
            'password' => $request->password,
        ];

        return Auth::guard('admin')->attempt($credentials, $request->remember);
    }
}
