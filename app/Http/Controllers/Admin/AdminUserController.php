<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function all_users()
    {
        $users = User::all();
        return view('admin.users.allUsers',compact('users'));
    }
}
