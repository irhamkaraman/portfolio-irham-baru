<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function auth()
    {
        $user = User::find(1);
        return view('app.auth.login', compact('user'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => 'Akun tidak ditemukan.']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Anda telah keluar.');
    }
}
