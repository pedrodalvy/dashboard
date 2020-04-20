<?php

namespace App\Http\Controllers\Auth;

use App\Services\AdminLoginService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminLoginController extends Controller
{    
    /**
     * loginservice
     *
     * @var mixed
     */
    private $loginservice;

    /**
     * AdminLoginController constructor.
     */
    public function __construct(AdminLoginService $loginservice)
    {
        $this->loginservice = $loginservice;

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
        return $this->loginservice->login($request);
    }

    /**
     * @return RedirectResponse
     */
    public function logout() {
        return $this->loginservice->logout();
    }


}
