<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formLogin() {
        if (auth('web')->check()) {
            return redirect()->route('admin.pesanan');
        } else {
            return view('admin.auth.login');
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth('web')->attempt($request->only(['email', 'password']))) {
            return redirect()->route('admin.pesanan');
        } else {
            return redirect()->route('admin.login')->with('error', 'Email atau password salah');
        }
    }

    public function logout() {
        auth('web')->logout();
        return redirect()->route('admin.login');
    }
}
