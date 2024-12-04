<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //  
        // $search = $request->search;
        // if (!empty($search)) {
        //     $agendas = Agenda::latest()
        //         ->where('id_agenda', 'like', "%$search%")
        //         ->orWhere('tema', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $agendas = Agenda::orderBy('tgl_posting', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $tema = $request->tema;

        $query = Agenda::query();

        if (!empty($search)) {
            $query->where('tema', 'like', "%$search%");
        }

        if (!empty($tema)) {
            $query->where('tema', $tema);
        }

        $agendas = $query->paginate(10);

        $temas = Agenda::select('tema')
                    ->groupBy('tema')
                    ->get();
        

            $berita['total_berita'] = Berita::count();
            $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
            $agenda['total_agenda'] = Agenda::count();
            $users['total_users'] = User::count();

        return view('administrator.agenda.index', compact('berita', 'halamanbaru', 'agenda', 'users', 'agendas', 'temas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    { 
        //
        return view('administrator.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
            'isi_agenda' => 'nullable|string|max:65535',
            'tempat' => 'nullable|string',
            'jam_mulai' => ['required', 'date_format:H:i'], // Validasi untuk jam mulai
            'jam_selesai' => ['required', 'date_format:H:i'], // Validasi untuk jam selesai
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'pengirim' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $tema = $request->tema;
        $jam = $request->jam_mulai . ' - ' . $request->jam_selesai . ' WIB'; // Menambahkan " WIB"
    
        // Proses file gambar
        $gambarName = null;
    
        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move(base_path('public_html/foto_agenda'), $gambarName);
        }
    
        $username = $request->username ?: 'admin';
    
        // Simpan data ke database
        Agenda::create([
            'tema' => $request->tema,
            'tema_seo' => Str::slug($request->tema),
            'isi_agenda' => $request->isi_agenda,
            'tempat' => $request->tempat,
            'gambar' => $gambarName,
            'jam' => $jam, // Simpan jam dengan " WIB"
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'pengirim' => $request->pengirim,
            'tgl_posting' => now(),
            "username" => $username,
        ]);
    
        return response()->json([
            'url' => route('administrator.agenda.index'),
            'success' => true,
            'message' => 'Data Agenda Berhasil Ditambah'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_agenda):View
    {
        //
        // dd($id_agenda);
        $agenda = Agenda::findOrFail($id_agenda);

        return view('administrator.agenda.edit', compact(['agenda']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_agenda)
    {
        $validated = $request->validate([
            'tema' => 'required|string|max:255', // Validasi tema
            'isi_agenda' => 'nullable|string||max:65535', // Validasi isi agenda
            'tempat' => 'required|string|max:255', // Validasi tempat
            'jam_mulai' => ['required', 'date_format:H:i'], // Validasi untuk jam mulai
            'jam_selesai' => ['required', 'date_format:H:i'], // Validasi untuk jam selesai
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'pengirim' => 'nullable|string|max:255', // Validasi pengirim
            'dibaca' => 'nullable|integer' // Validasi dibaca
        ]);
    
        $validated['dibaca'] = $validated['dibaca'] ?? 0;
    
        $agenda = Agenda::findOrFail($id_agenda);
    
        $tema = $request->tema;
        $username = $request->username ?: 'admin';
    
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;
        $jam = $request->jam_mulai . ' - ' . $request->jam_selesai . ' WIB'; // Menambahkan " WIB"
    
        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_agenda/", $gambarName);
    
            // Hapus gambar lama jika ada
            if ($agenda->gambar && file_exists("./foto_agenda/" . $agenda->gambar)) {
                unlink("./foto_agenda/" . $agenda->gambar);
            }
    
            $agenda->gambar = $gambarName;
        }
    
        $agenda->update([
            "tema" => $tema,
            "isi_agenda" => $validated['isi_agenda'],
            "tempat" => $validated['tempat'],
            "gambar" => $gambarName ?? $agenda->gambar,
            "jam" => $jam, // Simpan jam dengan " WIB"
            "username" => $username,
            "tgl_mulai" => $tgl_mulai,
            "tgl_selesai" => $tgl_selesai,
            'tgl_posting' => now(),
            "dibaca" => $validated['dibaca'],
            "pengirim" => $validated['pengirim']
        ]);
    
        return response()->json([
            'url' => route('administrator.agenda.index'),
            'success' => true,
            'message' => 'Data Agenda Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_agenda)
    {
        //
        $agenda = Agenda::findOrFail($id_agenda);
        if ($agenda->gambar) {
            $path = "./foto_agenda/" . $agenda->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $agenda->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
