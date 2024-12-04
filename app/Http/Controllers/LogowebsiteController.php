<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LogowebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        $logo = Logo::first();
        return view('administrator.logowebsite.index', compact('logo'));
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
    public function update(Request $request, string $id_logo)
    {
        //
        $validated = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $logo = Logo::findOrFail($id_logo);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $logoName = $gambar->getClientOriginalName();
            $gambar->move("./logo/", $logoName);

            // Menghapus gambar lama jika ada
            if ($logo->gambar) {
                $path = "./logo/" . $logo->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $logo->update(['gambar' => $logoName]);
        }

        session()->flash("pesan", "Logo berhasil diubah");
        return redirect()->route('administrator.logowebsite.index')->with(['success' => 'Logo berhasil diubah']);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
