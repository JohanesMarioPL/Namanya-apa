<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function getUsers(User $users)
    {
        $getRole = Role::select(['id', 'name'])->get();
        $users = User::select(['nrp', 'name', 'email', 'role_id'])->get();
        return Response()->view('admin.user', ['users' => $users, 'getRole' => $getRole]);
    }
}
