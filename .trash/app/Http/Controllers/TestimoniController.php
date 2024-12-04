<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $link = $request->link;

        $query = Testimoni::query();

        if (!empty($search)) {
            $query->where('link', 'like', "%$search%");
        }

        if (!empty($tagvid)) {
            $query->where('sidebar', $tagvid);
        }

        $testimonis = $query->paginate(10);

        $links = Testimoni::select('link')
                    ->groupBy('link')
                    ->get();

        return view('administrator.testimoni.index', compact(['testimonis', 'links']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $link = $request->link;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambar->move("./foto_testimoni/", $gambarName);
        }

        Testimoni::create([
            'link' => $link,
            'gambar' => $gambarName
        ]);

        return response()->json([
            'url' => route('administrator.testimoni.index'),
            'success' => true,
            'message' => 'Data Testimoni Berhasil Ditambah'
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
    public function edit(string $id)
    {
        //
        $testimonis = Testimoni::findOrFail($id);
        return view('administrator.testimoni.edit', compact('testimonis'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $testimonis = Testimoni::findOrFail($id);

        $link = $request->link;

        $gambarName = null;

        // Hapus gambar yang sebelumnya jika ada
        if ($testimonis->gambar && file_exists("./foto_testimoni/" . $testimonis->gambar)) {
            try {
                unlink("./foto_testimoni/" . $testimonis->gambar);
            } catch (\Exception $e) {
                // Jika gagal menghapus gambar, simpan error message
                $errorMessage = "Gagal menghapus gambar: " . $e->getMessage();
            }
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            try {
                $gambar->move("./foto_testimoni/", $gambarName);
            } catch (\Exception $e) {
                // Jika gagal memindahkan gambar, simpan error message
                $errorMessage = "Gagal memindahkan gambar: " . $e->getMessage();
            }
        } else {
            $gambarName = $testimonis->gambar;
        }

        $testimonis->update([
            "link" => $link,
            "gambar" => $gambarName
        ]);

        if (isset($errorMessage)) {
            return response()->json([
                'url' => route('administrator.testimoni.index'),
                'success' => false,
                'message' => 'Data Testimoni Gagal Diperbarui: ' . $errorMessage
            ]);
        } else {
            return response()->json([
                'url' => route('administrator.testimoni.index'),
                'success' => true,
                'message' => 'Data Testimoni Berhasil Diperbarui'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $testimonis = Testimoni::findOrFail($id);
        if ($testimonis->gambar && file_exists("./foto_testimoni/" . $testimonis->gambar)) {
            unlink("./foto_testimoni/" . $testimonis->gambar);
        }
        $testimonis->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
