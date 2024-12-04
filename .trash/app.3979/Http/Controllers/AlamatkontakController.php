<?php

namespace App\Http\Controllers;

use App\Models\Alamatkontak;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AlamatkontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        $alamatKontak = Alamatkontak::first();
        return view('administrator.alamatkontak.index', compact('alamatKontak'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_alamat)
    {
        //
        $validated = $request->validate([
            'alamat' => 'required|string',
        ]);

        $alamatKontak = Alamatkontak::findOrFail($id_alamat);

        $alamatKontak->update([
            "alamat" => $validated['alamat'],
        ]);

        session()->flash("pesan", "Alamat kontak berhasil diubah");
        return redirect()->route('administrator.alamatkontak.index')->with(['success' => 'Alamat kontak berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
