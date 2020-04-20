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
     * loginService
     *
     * @var mixed
     */
    private $loginService;

    /**
     * AdminLoginController constructor.
     */
    public function __construct(AdminLoginService $loginService)
    {
        $this->loginService = $loginService;

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
        return $this->loginService->login($request);
    }

    /**
     * @return RedirectResponse
     */
    public function logout() {
        return $this->loginService->logout();
    }


}
