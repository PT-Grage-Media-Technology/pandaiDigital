<?php

namespace App\Http\Controllers;

use App\Models\Ym;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class YmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $yms = Ym::latest()
        //         ->orWhere('nama', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $yms = Ym::orderBy('id', 'desc')->paginate(10);
        // }  


        $search = $request->search;
        $nama = $request->naman;

        $query = Ym::query();

        if (!empty($search)) {
            $query->where('nama', 'like', "%$search%")->orWhere('username', 'like', "%$search%");
        }
  
        if (!empty($nama)) {
            $query->where('nama', $nama);
        }

        $yms = $query->paginate(10);
        $namas = Ym::select('nama')
                    ->groupBy('nama')
                    ->get();

        return view('administrator.ym.index', compact(['yms', 'namas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.ym.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'ym_icon' => 'required|integer',
        ]);

        // Simpan data ke database
        YM::create([
            'nama' => $validated['nama'],
            'username' => $validated['username'],
            'ym_icon' => $validated['ym_icon'],
        ]);

        return response()->json([
            'url' => route('administrator.ym.index'),
            'success' => true,
            'message' => 'Data Yahoo Berhasil Ditambah'
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
    public function edit(string $id): View
    {
        //
        $ym = Ym::findOrFail($id);
        return view('administrator.ym.edit', compact('ym'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'ym_icon' => 'required|integer',
        ]);

        // Temukan data berdasarkan ID
        $ym = Ym::findOrFail($id);

        // Update data
        $ym->update([
            'nama' => $validated['nama'],
            'username' => $validated['username'],
            'ym_icon' => $validated['ym_icon'],
        ]);

        return response()->json([
            'url' => route('administrator.ym.index'),
            'success' => true,
            'message' => 'Data Yahoo Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ym = Ym::findOrFail($id);

        $ym->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
