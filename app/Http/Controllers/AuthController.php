<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityLog;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $remember = (bool) $request->boolean('remember');

        // 1) Coba login dengan email
        if (Auth::guard('web')->attempt(['email' => $credentials['username'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            ActivityLog::logUserActivity('user_login', 'User login: ' . $user->name, $user->id, 'User berhasil login ke sistem');

            return redirect()->intended('/profil');
        }

        // 2) Jika gagal, coba login dengan nama
        if (Auth::guard('web')->attempt(['name' => $credentials['username'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            ActivityLog::logUserActivity('user_login', 'User login: ' . $user->name, $user->id, 'User berhasil login ke sistem');

            return redirect()->intended('/profil');
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
} 