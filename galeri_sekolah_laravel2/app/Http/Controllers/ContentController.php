<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('admin.content.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'type' => 'required|in:homepage,about,contact,news,announcement',
            'status' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        Content::create($data);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'type' => 'required|in:homepage,about,contact,news,announcement',
            'status' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($content->image && file_exists(public_path($content->image))) {
                unlink(public_path($content->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $content->update($data);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        
        // Delete image if exists
        if ($content->image && file_exists(public_path($content->image))) {
            unlink(public_path($content->image));
        }
        
        $content->delete();

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil dihapus!');
    }
} 