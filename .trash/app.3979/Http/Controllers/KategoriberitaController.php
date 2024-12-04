<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class KategoriberitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //  
        $search = $request->search;
        $sidebar = $request->sidebar;

        $query = Kategori::query();

        if (!empty($search)) {
            $query->where('nama_kategori', 'like', "%$search%");
        }

        if (!empty($sidebar)) {
            $query->where('sidebar', $sidebar);
        }

        $kategori = $query->paginate(10);

        $sidebars = Kategori::select('sidebar')
                    ->groupBy('sidebar')
                    ->get();

        $berita['total_berita'] = Berita::count();
        $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
        $agenda['total_agenda'] = Agenda::count();
        $users['total_users'] = User::count();

        return view('administrator.kategoriberita.index', compact(['berita', 'halamanbaru', 'agenda', 'users', 'kategori', 'sidebars']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.kategoriberita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'aktif' => 'required|in:Y,N',
            'sidebar' => 'required|integer'
        ]);

        $username = $request->username ?: 'admin';

        Kategori::create([
            'nama_kategori' => $validated['nama_kategori'],
            'aktif' => $validated['aktif'],
            'sidebar' => $validated['sidebar'],
            'kategori_seo' => Str::slug($validated['nama_kategori']),
            'username' => $username
        ]);

        return response()->json([
            'url' => route('administrator.kategoriberita.index'),
            'success' => true,
            'message' => 'Data Kategori Berita Berhasil Ditambah'
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
    public function edit(string $id_kategori):View
    {
        //
        $kategori = Kategori::findOrFail($id_kategori);
        return view('administrator.kategoriberita.edit', compact(['kategori']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_kategori)
    {
        //
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'aktif' => 'required|in:Y,N',
            'sidebar' => 'required|integer'
        ]);

        $kategori = Kategori::findOrFail($id_kategori);

        $nama_kategori = $request->nama_kategori;
        $username = $request->username ?: 'admin';

        $kategori->update([
            "nama_kategori" => $nama_kategori,
            "aktif" => $request->aktif,
            "sidebar" => $request->sidebar,
            "kategori_seo" => Str::slug($validated['nama_kategori']),
            "username" => $username
        ]);

        return response()->json([
            'url' => route('administrator.kategoriberita.index'),
            'success' => true,
            'message' => 'Data Kategori Berita Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_kategori)
    {
        //
        $kategori = Kategori::findOrFail($id_kategori);

        $kategori->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
