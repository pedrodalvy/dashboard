<?php

namespace App\Http\Controllers\Admin;

use App\Services\AdminUsersService;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function showUsersPage()
    {
        $users = AdminUsersService::getAllUsers();
        return view('admin.users.users')
            ->with('users', $users);
    }
}
