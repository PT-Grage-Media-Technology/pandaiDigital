<?php

namespace App\Http\Controllers;

use App\Models\Halamanbaru;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class HalamanbaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->search;
        $month = $request->month;

        $query = Halamanbaru::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%")
                ->orWhere('tgl_posting', 'like', "%$search%");
        }  

        if (!empty($month)) {
            $query->whereMonth('tgl_posting', $month);
        }

        $halamanbaru = $query->orderBy('tgl_posting', 'desc')->paginate(10);

        $months = Halamanbaru::selectRaw('MONTH(tgl_posting) as month')
                    ->groupBy('month')
                    ->get();

        return view('administrator.halamanbaru.index', compact(['halamanbaru', 'months']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.halamanbaru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_halaman' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_halaman/", $gambarName);
        }

        $username = $request->username ?: 'admin';

        Halamanbaru::create([
            "judul" => $judul,
            "isi_halaman" => $request->isi_halaman,
            "judul_seo" => Str::slug($validated['judul']),
            "tgl_posting" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username,
            "gambar" => $gambarName
        ]);

        return response()->json([
            'url' => route('administrator.halamanbaru.index'),
            'success' => true,
            'message' => 'Data Halaman baru Berhasil Ditambah'
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
    public function edit(string $id_halaman):View
    {
        //
        $halamanbaru = Halamanbaru::findOrFail($id_halaman);
        return view('administrator.halamanbaru.edit', compact('halamanbaru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_halaman)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_halaman' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $halamanbaru = Halamanbaru::findOrFail($id_halaman);

        $judul = $request->judul;
        $username = $request->username ?: 'admin';

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_halaman/", $gambarName);
            $halamanbaru->gambar = $gambarName;
        }

        $halamanbaru->update([
            "judul" => $judul,
            "isi_halaman" => $request->isi_halaman,
            "judul_seo" => Str::slug($validated['judul']),
            "tgl_posting" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username
        ]);

        // session()->flash("pesan", "Data berhasil Diperbarui");
        // return redirect()->route('administrator.halamanbaru.index')->with(['success' => 'Data berhasil Diperbarui']);
        return response()->json([
            'url' => route('administrator.halamanbaru.index'),
            'success' => true,
            'message' => 'Data Halaman baru Berhasil Diperbaharui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_halaman)
    {
        //
        $halamanbaru = Halamanbaru::findOrFail($id_halaman);
        $halamanbaru->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
