<?php

namespace App\Http\Controllers;

use App\Models\Kategoriprogram;
use App\Models\Program;
use App\Models\Trainer;
use App\Models\Trainerprogramgroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $nama_trainer = $request->nama_trainer;

        $query = Trainer::query();

        if (!empty($search)) {
            $query->where('nama_trainer', 'like', "%$search%");
        }

        if (!empty($nama_trainer)) {
            $query->where('nama_trainer', $nama_trainer)->orWhere('username', $username);
        }

        $trainers = $query->with('pengajar')->paginate(10); // Tambahkan relasi user

        $nama_trainers = Trainer::select('nama_trainer')
                    ->groupBy('nama_trainer')
                    ->get();

        return view('administrator.trainer.index', compact(['trainers', 'nama_trainers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategoriprogram = Kategoriprogram::all();
        $manajemenusers = User::where('level', 'pengajar')->get();

        return view('administrator.trainer.create', compact('kategoriprogram', 'manajemenusers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_trainer' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'nullable|string|max:9999',
            'ttd' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10046',
            'id' => 'nullable|exists:users,id',
        ]);

        $gambarName = null;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambar->move("./foto_trainer/", $gambarName);
        }
        
        $ttdName = null;
        
        if ($request->hasFile('ttd')) {
            $ttd = $request->file("ttd");
            $ttdName = $ttd->getClientOriginalName(); // Menggunakan nama file asli
            $ttd->move("./ttd_trainer/", $ttdName);
        }

        Trainer::create([
            // 'id_trainer' => Str::uuid(),
            'nama_trainer' => $validated['nama_trainer'],
            'foto' => $gambarName,
            'link' => $validated['link'],
            'ttd' => $ttdName,
            'id' => $request->id,
        ]);


        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Ditambah'
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
    public function edit(string $id_trainer)
    {
        //
        $trainers = Trainer::findOrFail($id_trainer);
        $manajemenusers = User::where('level', 'pengajar')->get();

        return view('administrator.trainer.edit', compact('trainers', 'manajemenusers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_trainer)
    {
        $trainers = Trainer::findOrFail($id_trainer);

        $updateData = [
            "nama_trainer" => $request->nama_trainer,
            "link" => $request->link,
            'id' => $request->id,
        ];

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_trainer/", $gambarName);

            // Menghapus gambar lama jika ada
            if ($trainers->foto) {
                $path = "./foto_trainer/" . $trainers->foto;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $updateData['foto'] = $gambarName;
        }
        
        if ($request->hasFile('ttd')) {
            $ttd = $request->file("ttd");
            $ttdName = $ttd->getClientOriginalName();
            $ttd->move("./ttd_trainer/", $ttdName);

            // Menghapus gambar lama jika ada
            if ($trainers->ttd) {
                $path = "./ttd_trainer/" . $trainers->ttd;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $updateData['ttd'] = $ttdName;
        }

        $trainers->update($updateData);

        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_trainer)
    {
        //
        $trainers = Trainer::findOrFail($id_trainer);
        if ($trainers->foto) {
            $path = "./foto_trainer/" . $trainers->foto;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        if ($trainers->ttd) {
            $path = "./ttd_trainer/" . $trainers->ttd;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $trainers->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
