<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AdminResetPasswordService;
use Exception;
use Illuminate\Http\Request;

class AdminResetPasswordController extends Controller
{    
    /**
     * resetService
     *
     * @var mixed
     */
    private $resetService;
    
    /**
     * __construct
     *
     * @param  mixed $resetService
     * @return void
     */
    public function __construct(AdminResetPasswordService $resetService)
    {
        $this->resetService = $resetService;
        $this->middleware('guest:admin');
        // ->except('logout');
    }
    
    /**
     * showForm
     *
     * @return void
     */
    public function showForm()
    {
        return view('admin.auth.forgot-password');
    }
    
    /**
     * reset
     *
     * @param  mixed $request
     * @return void
     */
    public function reset(Request $request)
    {
        try {
            return $this->resetService->reset($request);

        } catch (Exception $ex) {
            return response('Falha ao gerar o token', '400');
        }

    }
    
    /**
     * showUpdatePassForm
     *
     * @param  mixed $token
     * @return void
     */
    public function showUpdatePassForm(String $token)
    {
        return view('admin.auth.reset-pass-form')
            ->with('token', $token);
    }
    
    /**
     * updatePassword
     *
     * @param  mixed $request
     * @return void
     */
    public function updatePassword(Request $request)
    {
        try {
            return $this->resetService->updatePassword($request);

        } catch (Exception $ex) {
            return response('Falha ao cadastrar a nova senha', '400');
        }
    }
}
