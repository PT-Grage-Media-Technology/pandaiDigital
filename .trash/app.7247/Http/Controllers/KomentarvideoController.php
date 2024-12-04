<?php

namespace App\Http\Controllers;

use App\Models\Komentarvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class KomentarvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        // $search = $request->search;
        // if(!empty($search)) {
        //     $komentarvideo = Komentarvideo::latest()
        //     ->where('nama_komentar', 'like', "%$search%")
        //     ->paginate(10);
        // }else {
        //     $komentarvideo = Komentarvideo::paginate(10);
        // }

        $search = $request->search;
        $aktif = $request->aktif;

        $query = Komentarvideo::query();

        if (!empty($aktif)) {
            $query->where('nama_komentar', 'like', "%$search%")->orWhere('isi_komentar', 'like', "%$search%")->orWhere('jam_komentar', 'like', "%$search%")->orWhere('url', 'like', "%$search%");
        }
  
        if (!empty($aktif)) {
            $query->where('aktif', $aktif);
        }

        $komentarvideo = $query->paginate(10);

        $aktived = Komentarvideo::select('aktif')
                    ->groupBy('aktif')
                    ->get();

        return view('administrator.komentarvideo.index', compact(['komentarvideo', 'aktived']));
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
        $komentarvideo = Komentarvideo::findOrFail($id_komentar);
        return view('administrator.komentarvideo.edit', compact(['komentarvideo']));
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

        $komentarvideo = Komentarvideo::findOrFail($id_komentar);

        $komentarvideo->update([
            "nama_komentar" => $nama_komentar,
            "url" => $url,
            "isi_komentar" => $isi_komentar,
            "email" => $email,
            "aktif" => $validated['aktif'],
            "tgl" => now(),
            "jam_komentar" => now()
        ]);

        return response()->json([
            'url' => route('administrator.komentarvideo.index'),
            'success' => true,
            'message' => 'Data Komentar Video Berhasil Diperbaharui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_komentar)
    {
        //
        $komentarvideo = Komentarvideo::findOrFail($id_komentar);
        $komentarvideo->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
