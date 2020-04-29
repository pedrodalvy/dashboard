<?php

namespace App\Http\Controllers\User;

use App\Services\AdminUsersService;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    private $adminUsersService;

    public function __construct(AdminUsersService $adminUsersService)
    {
        $this->adminUsersService = $adminUsersService;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = $this->adminUsersService->getAllUsers();
        return view('users.users')
            ->with('users', $users);
    }

    public function show($id)
    {
        try {
            return $this->adminUsersService->showUser($id);
        } catch (Exception $ex) {
            return back()->with('error', 'Foi foi possível realizar esta operação.');
        }
    }

    public function edit($id)
    {
        try {
            return $this->adminUsersService->editUser($id);
        } catch (Exception $ex) {
            return back()->with('error', 'Foi foi possível realizar esta operação.');
        }
    }

    public function update(Request $request, $id)
    {
        $this->adminUsersService->validateUser($request);
        try {
            return $this->adminUsersService->updateUser($request, $id);
        } catch (Exception $ex) {
            return back()->with('error', 'Foi foi possível realizar esta operação.');
        }
    }
}
