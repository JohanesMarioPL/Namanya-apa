<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers(User $users)
    {
        $getRole = Role::select(['id', 'name'])->get();
        $users = User::select(['nrp', 'name', 'email', 'role_id'])->get();
        return Response()->view('admin.user', ['users' => $users, 'getRole' => $getRole]);
    }

    public function addUsers(Request $request)
    {
        $nrp = User::where('nrp', $request->input('nrp'))->first();
        $email = User::where('email', $request->input('email'))->first();

        if (!empty($nrp)) {
            return back()->withInput()->withErrors(['error' => 'NRP sudah ada']);
        } else if (!empty($email)) {
            return back()->withInput()->withErrors(['error' => 'Email sudah ada']);
        } else {
            User::create([
                'nrp' => $request->input('nrp'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make('12345678'),
                'role_id' => $request->input('role_id')
            ]);
        }

        return redirect('/admin/user');
    }

    public function editUsers(Request $request, User $user, $id)
    {
        $user = User::query()->find($id);
        $nrp = User::where('nrp', $request->input('nrp'))->first();
        $email = User::where('email', $request->input('email'))->first();

        if (!empty($nrp) && $user['id'] != $nrp['id']) {
            if ($user['id'] != $nrp['id']) {
                return back()->withInput()->withErrors(['error' => 'NRP sudah ada']);
            }
        } else if (!empty($email) && $user['id'] != $email['id']) {
            if ($user['id'] != $email['id']) {
                return back()->withInput()->withErrors(['error' => 'Email sudah ada']);
            }
        }
        User::where('id', $id)->update([
            'nrp' => $request->input('nrp'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
        ]);

        return redirect('/admin/user');

    }


}
