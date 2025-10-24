<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function edit()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.edit', compact('settings'));
    }

    public function security()
    {
        return view('admin.settings.security');
    }

    public function database()
    {
        return view('admin.settings.database');
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string',
            'school_phone' => 'required|string|max:20',
            'school_email' => 'required|email',
            'school_website' => 'nullable|url',
            'school_description' => 'nullable|string',
            'school_vision' => 'nullable|string',
            'school_mission' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $settings = [
            'school_name' => $request->school_name,
            'school_address' => $request->school_address,
            'school_phone' => $request->school_phone,
            'school_email' => $request->school_email,
            'school_website' => $request->school_website,
            'school_description' => $request->school_description,
            'school_vision' => $request->school_vision,
            'school_mission' => $request->school_mission
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logosmkn4.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images'), $logoName);
            
            Setting::updateOrCreate(
                ['key' => 'school_logo'],
                ['value' => 'images/' . $logoName]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui!');
    }
} 