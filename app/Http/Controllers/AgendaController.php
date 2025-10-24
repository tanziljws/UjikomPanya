<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('date', 'asc')->paginate(10);
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
            'image' => 'nullable|file|max:2048'
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

        $agenda = Agenda::create($data);

        // Log aktivitas admin
        ActivityLog::logAdminActivity(
            'admin_post_agenda',
            'Tambah agenda: ' . $request->title,
            Auth::id(),
            'Agenda baru berhasil ditambahkan'
        );

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
            'image' => 'nullable|file|max:2048'
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($agenda->image && file_exists(public_path('images/' . $agenda->image))) {
                unlink(public_path('images/' . $agenda->image));
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

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        
        // Delete image if exists
        if ($agenda->image && file_exists(public_path('images/' . $agenda->image))) {
            unlink(public_path('images/' . $agenda->image));
        }
        
        $agenda->delete();

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }
} 