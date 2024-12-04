<?php

namespace App\Http\Controllers;

use App\Models\Sensorkomentar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SensorkomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */  
    public function index(Request $request): View
    {
        //
        // $search = $request->search;
        // if (!empty($search)) {
        //     $sensors = Sensorkomentar::latest()
        //         ->orWhere('kata', 'like', "%$search%")
        //         ->paginate(10);
        // } else {
        //     $sensors = Sensorkomentar::orderBy('id_jelek', 'desc')->paginate(10);
        // }

        $search = $request->search;
        $kata = $request->kata;

        $query = Sensorkomentar::query();

        if (!empty($search)) {
            $query->where('kata', 'like', "%$search%")->orWhere('username', 'like', "%$search%");
        }

        if (!empty($kata)) {
            $query->where('kata', $kata);
        }

        $sensors = $query->paginate(10);

        $katas = Sensorkomentar::select('kata')
                    ->groupBy('kata')
                    ->get();

        return view('administrator.sensorkomentar.index', compact(['sensors', 'katas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.sensorkomentar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'kata' => 'required|string|max:255',
            'ganti' => 'required|string|max:255',
        ]);

        $username = $request->username ?: 'admin';

        // Simpan data ke database
        Sensorkomentar::create([
            'kata' => $validated['kata'],
            'ganti' => $validated['ganti'],
            'username' => $username
        ]);

        return response()->json([
            'url' => route('administrator.sensorkomentar.index'),
            'success' => true,
            'message' => 'Data Sensor Komentar Berhasil Ditambah'
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
    public function edit(string $id_jelek): View
    {
        //
        $sensor = Sensorkomentar::findOrFail($id_jelek);
        return view('administrator.sensorkomentar.edit', compact('sensor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_jelek)
    {
        //
        $validated = $request->validate([
            'kata' => 'required|string|max:255',
            'ganti' => 'required|string|max:255',
        ]);

        $sensor = Sensorkomentar::findOrFail($id_jelek);

        $sensor->update([
            'kata' => $validated['kata'],
            'ganti' => $validated['ganti'],
            'username' => 'admin',
        ]);

        return response()->json([
            'url' => route('administrator.sensorkomentar.index'),
            'success' => true,
            'message' => 'Data Sensor Komentar Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jelek)
    {
        //
        $sensor = Sensorkomentar::findOrFail($id_jelek);

        $sensor->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
