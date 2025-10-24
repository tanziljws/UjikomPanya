<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->photo && file_exists(public_path('images/profiles/' . $user->photo))) {
            unlink(public_path('images/profiles/' . $user->photo));
        }

        // Upload new photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            
            // Create directory if not exists
            if (!file_exists(public_path('images/profiles'))) {
                mkdir(public_path('images/profiles'), 0777, true);
            }
            
            $file->move(public_path('images/profiles'), $filename);
            
            $user->photo = $filename;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Foto profil berhasil diupdate',
                'photo_url' => asset('images/profiles/' . $filename)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal mengupload foto'
        ], 400);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diupdate');
    }
}
