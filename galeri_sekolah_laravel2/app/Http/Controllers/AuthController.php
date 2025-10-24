<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        // Check if it's a regular user (by email or name)
        $user = User::where('email', $credentials['username'])
                   ->orWhere('name', $credentials['username'])
                   ->first();

        if ($user && Auth::guard('web')->attempt(['email' => $user->email, 'password' => $credentials['password']])) {
            $request->session()->regenerate();
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