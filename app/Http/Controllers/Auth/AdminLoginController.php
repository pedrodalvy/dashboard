<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminLoginController extends Controller
{
    /**
     * AdminLoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:admin')
            ->except('logout');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
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
     * @return RedirectResponse
     */
    public function logout() {
        Auth::logout();
        return redirect()->intended(route('admin.login'));
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     * @return void
     *
     */
    static function validateLogin(Request $request)
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
    static function attempt(Request $request) {
        $credentials = [
            'user' => $request->user,
            'password' => $request->password,
        ];

        return Auth::guard('admin')->attempt($credentials, $request->remember);
    }
}
