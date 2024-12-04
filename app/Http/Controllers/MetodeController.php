<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use Illuminate\Http\Request;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $tanggal = $request->tanggal;

        $query = Metode::query();

        if (!empty($search)) {
            $query->where('nama_program', 'like', "%$search%")->orWhere('harga', 'like', "%$search%")->orWhere('judul', 'like', "%$search%")->orWhere('keterangan', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $methods = $query->paginate(10);

        return view('administrator.metode.index', compact(['methods']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.metode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
            'pembayaran' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ]);

        $gambarName = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_metode/", $gambarName);
        }
        $pembayaranName = null;
        if ($request->hasFile('pembayaran')) {
            $pembayaran = $request->file("pembayaran");
            $pembayaranName = $pembayaran->getClientOriginalName();
            $pembayaran->move(base_path('public_html/foto_metode'), $pembayaranName);
        }

        $metode = Metode::create([
            'nama_pembayaran' => $validatedData['nama_pembayaran'],
            'gambar' => $gambarName,
            'pembayaran' => $pembayaranName,
        ]);

        return response()->json([
            'url' => route('administrator.metode.index'),
            'success' => true,
            'message' => 'Data Metode Berhasil Ditambah'
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
    public function edit(string $id_metode)
    {
        //
        $metode = Metode::findorfail($id_metode);
        return view('administrator.metode.edit', compact('metode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_metode)
    {
        $validatedData = $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            'pembayaran' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ]);
    
        $metode = Metode::findorfail($id_metode);
        $metode->nama_pembayaran = $validatedData['nama_pembayaran'];
    
        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move(base_path('public_html/foto_metode'), $gambarName);
    
            // Menghapus gambar lama jika ada
            if ($metode->gambar && file_exists("./foto_metode/" . $metode->gambar)) {
                unlink("./foto_metode/" . $metode->gambar);
            }
    
            $metode->gambar = $gambarName;
        }
    
        if ($request->hasFile('pembayaran')) {
            $pembayaran = $request->file("pembayaran");
            $pembayaranName = $pembayaran->getClientOriginalName();
            $pembayaran->move(base_path('public_html/foto_pembayaran'), $pembayaranName);
    
            // Menghapus gambar lama jika ada
            if ($metode->pembayaran && file_exists("./foto_pembayaran/" . $metode->pembayaran)) {
                unlink("./foto_pembayaran/" . $metode->pembayaran);
            }
    
            $metode->pembayaran = $pembayaranName;
        }
    
        $metode->save();
    
        return response()->json([
            'url' => route('administrator.metode.index'),
            'success' => true,
            'message' => 'Data Metode Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_metode)
    {
        //
        $meto = Metode::findOrFail($id_metode);
        if ($meto->gambar) {
            $path = "./foto_metode/" . $meto->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        if ($meto->pembayaran) {
            $path = "./foto_pembayaran/" . $meto->pembayaran;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $meto->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
