<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::orderBy('published_at', 'desc')->get();
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        Informasi::create($data);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($informasi->image && file_exists(public_path($informasi->image))) {
                unlink(public_path($informasi->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        
        // Delete image if exists
        if ($informasi->image && file_exists(public_path($informasi->image))) {
            unlink(public_path($informasi->image));
        }
        
        $informasi->delete();

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
} 