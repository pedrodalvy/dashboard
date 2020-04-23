<?php

namespace App\Http\Controllers\User;

use App\Services\AdminUsersService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = AdminUsersService::getAllUsers();
        return view('users.users')
            ->with('users', $users);
    }
}
