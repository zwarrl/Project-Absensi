<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {

        return redirect()->route('dashboard'); // ⬅ Redirect ada di sini!
    }

    return back()->withErrors([
        'username' => 'Username atau password salah'
    ]);
}

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Lakukan login dengan Auth::attempt()
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Redirect langsung ke dashboard (DashboardController akan membagi role)
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'login' => 'Username atau password salah!'
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
