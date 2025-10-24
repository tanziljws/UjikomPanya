<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'active',
        ]);

        Auth::login($user);

        // Log aktivitas user register
        ActivityLog::logUserActivity(
            'user_register',
            'Registrasi user baru: ' . $user->name,
            $user->id,
            'User baru berhasil mendaftar'
        );

        return redirect()->route('galeri')->with('success', 'Akun berhasil dibuat! Selamat datang, ' . $user->name);
    }
}
