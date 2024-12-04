<?php

namespace App\Http\Controllers;
use App\Models\Portofolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $judul = $request->judul;

        $query = Portofolio::query();

        if (!empty($search)) {
            $query->where('judul', 'like', "%$search%");
        }

        if (!empty($judul)) {
            $query->where('judul', $judul);
        }

        $portos = $query->paginate(10);

        $juduls = Portofolio::select('judul')
                    ->groupBy('judul')
                    ->get();
        

        return view('administrator.portofolio.index', compact('portos', 'juduls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'deskripsi' => 'required',
            'link' => 'nullable'
        ]);

        $data = $request->all();
        $data['id_porto'] = Str::uuid();

        $gambarName = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./portofolio/", $gambarName);
        }

        Portofolio::create([
            "id_porto" => $data['id_porto'],
            "judul" => $data['judul'],
            "deskripsi" => $data['deskripsi'],
            "gambar" => $gambarName,
            "link" => $data['link']
        ]);

        return response()->json([
            'url' => route('administrator.portofolio.index'),
            'success' => true,
            'message' => 'Data Portofolio Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $portos = Portofolio::all();
        
        return view('myskill.pages.e-learning.e-learning', compact('portos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_porto)
    {
        $portofolio = Portofolio::findOrFail($id_porto);
        return view('administrator.portofolio.edit', compact(['portofolio']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_porto)
    {
        //
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deskripsi' => 'required',
            'link' => 'nullable'
        ]);

        $portofolio = Portofolio::findorfail($id_porto);
        $portofolio->judul = $validatedData['judul'];
        $portofolio->deskripsi = $validatedData['deskripsi'];
        $portofolio->link = $validatedData['link'];

        // Save thumbnail
        if ($request->hasFile('gambar')) {
            if ($portofolio->gambar) {
                $path = "./portofolio/" . $portofolio->gambar;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $gambar = $request->file("gambar");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./portofolio/", $gambarName);
            $portofolio->gambar = $gambarName;
        }

        $portofolio->save();

        return response()->json([
            'url' => route('administrator.portofolio.index'),
            'success' => true,
            'message' => 'Data Portofolio Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $portofolio = Portofolio::findorfail($id);
        if ($portofolio->gambar) {
            $path = "./portofolio/" . $portofolio->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $portofolio->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
