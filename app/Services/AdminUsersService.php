<?php

namespace App\Services;

use App\Admin;

class AdminUsersService
{
    public function getAllUsers() {
        return Admin::all();
    }

    public function showUser($id)
    {
        $user = Admin::findOrFail($id);

        return view('users.show')
            ->with('user', $user);
    }
}