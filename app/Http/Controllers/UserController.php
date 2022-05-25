<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.account.index', compact('users'));
    }

    public function create() {
        return view('admin.account.create');
    }

    public function store(Request $request) {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect to user detail
        return redirect()->route('admin.account')->with('success', 'Akun berhasil ditambahkan');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.account.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update user
        $user = User::find($id);
        if(Hash::check($request->input('password'), $user->password)){
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if($request->input('new_password') != null){
                $user->password = Hash::make($request->input('new_password'));
            }
            $user->save();
        } else {
            return redirect()->route('admin.account.edit', $id)->with('error', 'Password tidak sesuai');
        }

        // Redirect to user detail
        return redirect()->route('admin.account')->with('success', 'Akun berhasil diubah');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.account')->with('success', 'Akun berhasil dihapus');
    }
}