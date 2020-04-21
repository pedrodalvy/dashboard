<?php

namespace App\Services;

use App\Admin;

class AdminUsersService
{
    static function getAllUsers() {
        return Admin::all();
    }
}