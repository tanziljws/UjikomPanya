<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Agenda;
use App\Models\Informasi;
use App\Models\Galeri;

class PublicController extends Controller
{
    public function agenda()
    {
        $agendas = Agenda::where('status', true)
                        ->orderBy('date', 'asc')
                        ->paginate(12);
        
        // Debug: Log the data being sent to view
        Log::info('Agenda data being sent to view', [
            'count' => $agendas->count(),
            'total' => $agendas->total(),
            'current_page' => $agendas->currentPage(),
            'first_item' => $agendas->first() ? $agendas->first()->toArray() : null
        ]);
        
        return view('agenda', compact('agendas'));
    }

    public function informasi()
    {
        $informasis = Informasi::where('status', true)
                               ->orderBy('published_at', 'desc')
                               ->paginate(12);
        return view('informasi', compact('informasis'));
    }

    public function galeri()
    {
        $galeris = Galeri::withCount(['likes', 'comments'])
                         ->orderBy('created_at', 'desc')
                         ->paginate(6);
        return view('galeri', compact('galeris'));
    }

}
