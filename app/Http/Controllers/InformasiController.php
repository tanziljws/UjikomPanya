<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\ActivityLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.informasi.index', compact('informasis'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'category' => 'required|in:news,announcement,academic,event,other',
            'author' => 'required|string|max:255',
            'status' => 'boolean',
            'image' => 'nullable|file|max:2048',
            'published_at' => 'required|date'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            
            // Validasi ekstensi file secara manual
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return back()->withErrors(['image' => 'Format file tidak didukung. Gunakan JPG, PNG, atau GIF.']);
            }
            
            $imageName = time() . '.' . $extension;
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $informasi = Informasi::create($data);

        // Log aktivitas admin
        ActivityLog::logAdminActivity(
            'admin_post_informasi',
            'Tambah informasi: ' . $request->title,
            Auth::id(),
            'Informasi baru berhasil ditambahkan'
        );

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.show', compact('informasi'));
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'category' => 'required|in:news,announcement,academic,event,other',
            'author' => 'required|string|max:255',
            'status' => 'boolean',
            'image' => 'nullable|file|max:2048',
            'published_at' => 'required|date'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($informasi->image && file_exists(public_path('images/' . $informasi->image))) {
                unlink(public_path('images/' . $informasi->image));
            }
            
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            
            // Validasi ekstensi file secara manual
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return back()->withErrors(['image' => 'Format file tidak didukung. Gunakan JPG, PNG, atau GIF.']);
            }
            
            $imageName = time() . '.' . $extension;
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        
        // Delete image if exists
        if ($informasi->image && file_exists(public_path('images/' . $informasi->image))) {
            unlink(public_path('images/' . $informasi->image));
        }
        
        $informasi->delete();

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
} 