<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();
        // Jika username tidak ditemukan
        if (!$user) {
    return redirect()->route('login')->with('error', 'Data pengguna tidak ditemukan!');
}
        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah!');
        }

        // Login user
        Auth::login($user);

        // Redirect hanya ke 1 dashboard
        return redirect()->intended('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
