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
        $users = User::select(['nrp', 'name', 'email', 'role_id', 'prodi_id'])->get();
        return Response()->view('admin.user', ['users' => $users, 'getRole' => $getRole]);
    }

    public function addUsers(Request $request)
    {
        $existingNrp = User::where('nrp', $request->input('nrp'))->first();
        $existingEmail = User::where('email', $request->input('email'))->first();

        if ($existingNrp) {
            return back()->withInput()->withErrors(['error' => 'NRP sudah ada']);
        } elseif ($existingEmail) {
            return back()->withInput()->withErrors(['error' => 'Email sudah ada']);
        } else {
            User::create([
                'nrp' => $request->input('nrp'), // Use the value from the request
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'prodi_id' => $request->input('prodi'),
                'password' => Hash::make('12345678'),
                'role_id' => $request->input('role_id')
            ]);
        }


        return redirect('/admin/user');
    }

    public function edit(Request $request, $nrp)
    {
        $user = User::where('nrp', $nrp)->get();
//        dd($user);
        return view('admin.user-edit', ['users' => $user[0]]);
    }

    public function editUser(Request $request, $nrp)
    {
        $request->validate([
            'nrp' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);

      User::where('nrp', $nrp)->update([
            'nrp' => $request->input('nrp'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
      ]);

        return redirect()->route('admin-users');
    }

    public function deleteUser(Request $request, $nrp)
    {
        $user = User::where('nrp', $nrp)->first(); // Menggunakan 'first()' untuk mengambil satu pengguna

        if (!$user) {
            return redirect()->route('admin-users')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('admin-users')->with('success', 'User deleted successfully');
    }

}
