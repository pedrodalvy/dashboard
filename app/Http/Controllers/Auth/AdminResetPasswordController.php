<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Services\AdminResetPasswordService;

class AdminResetPasswordController extends Controller
{
    private $resetService;

    public function __construct(AdminResetPasswordService $resetService)
    {
        $this->resetService = $resetService;
        $this->middleware('guest:admin');
            // ->except('logout');
    }

    public function showForm() {
        return view('admin.auth.forgot-password');
    }

    public function reset(Request $request) {
        return $this->resetService->reset($request);
    }

    public function showUpdatePassForm(String $token) {
        return view('admin.auth.reset-pass-form');
    }
}
