<?php

namespace App\Http\Controllers;

use App\Models\Komentarberita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;  

class KomentarberitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //  
        // $search = $request->search;
        // if(!empty($search)) {
        //     $komentarberita = Komentarberita::latest()
        //     ->where('nama_komentar', 'like', "%$search%")
        //     ->paginate(10);
        // }else {
        //     $komentarberita = Komentarberita::paginate(10);
        // }

        $search = $request->search;
        $aktif = $request->aktif;

        $query = Komentarberita::query();

        if (!empty($search)) {
            $query->where('nama_komentar', 'like', "%$search%")->orWhere('isi_komentar', 'like', "%$search%");
        }

        if (!empty($aktif)) {
            $query->where('aktif', $aktif);
        }

        $komentarberita = $query->paginate(10);

        $aktived = Komentarberita::select('aktif')
                    ->groupBy('aktif')
                    ->get();

        return view('administrator.komentarberita.index', compact(['komentarberita', 'aktived']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id_komentar):View
    {
        //
        $komentarberita = Komentarberita::findOrFail($id_komentar);
        return view('administrator.komentarberita.edit', compact(['komentarberita']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_komentar)
    {
        //
        $validated = $request->validate([
            'aktif' => 'required|in:Y,N'
        ]);

        $nama_komentar = $request->nama_komentar;
        $url = $request->url;
        $isi_komentar = $request->isi_komentar;
        $email = $request->email;

        $komentarberita = Komentarberita::findOrFail($id_komentar);

        $komentarberita->update([
            "nama_komentar" => $nama_komentar,
            "url" => $url,
            "isi_komentar" => $isi_komentar,
            "email" => $email,
            "aktif" => $validated['aktif'],
            "tgl" => now(),
            "jam_komentar" => now()
        ]);

        return response()->json([
            'url' => route('administrator.komentarberita.index'),
            'success' => true,
            'message' => 'Data Komentar Berita Berhasil Diperbaharui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_komentar)
    {
        //  
        $komentarberita = Komentarberita::findOrFail($id_komentar);
        $komentarberita->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
