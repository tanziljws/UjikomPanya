<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('date', 'asc')->get();
        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'type' => 'required|in:academic,event,meeting,competition,other',
            'status' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'type' => 'required|in:academic,event,meeting,competition,other',
            'status' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($agenda->image && file_exists(public_path($agenda->image))) {
                unlink(public_path($agenda->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        
        // Delete image if exists
        if ($agenda->image && file_exists(public_path($agenda->image))) {
            unlink(public_path($agenda->image));
        }
        
        $agenda->delete();

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }
} 