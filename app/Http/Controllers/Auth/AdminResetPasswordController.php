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
        return view('partials.auth.forgot-password');
    }

    /**
     * reset
     *
     * @param  mixed $request
     * @return void
     */
    public function reset(Request $request)
    {
        $this->resetService->validateUserAndEmail($request);

        try {
            return $this->resetService->reset($request);

        } catch (Exception $ex) {
            return back()
                ->with('error', 'Falha ao gerar o token.');
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
        $inTime = $this->resetService->validateUpdatePasswordForm($token);

        if ($inTime) {
            return view('partials.auth.reset-password')
                ->with('token', $token);
        }

        return redirect()->route('admin.password.form')
            ->with(
                'error',
                'O link para redefinição da sua senha está expirado. Solicite novamente'
            );
    }

    /**
     * updatePassword
     *
     * @param  mixed $request
     * @return void
     */
    public function updatePassword(Request $request)
    {
        $this->resetService->validatePassword($request);

        try {
            return $this->resetService->updatePassword($request);

        } catch (Exception $ex) {
            return back()
                ->with('error', 'Falha ao cadastrar a nova senha.');
        }
    }
}
