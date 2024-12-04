<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $id_materi = $request->id_materi; // Tambahkan ini

        $query = Tugas::query();

        if (!empty($search)) {
            $query->where('judul_tugas', 'like', "%$search%");
        }

        if (!empty($id_materi)) { // Tambahkan ini
            $query->where('id_materi', $id_materi);
        }

        $tugass = $query->with('materi')->paginate(10); // Tambahkan relasi materi

        return view('pengajar.tugas.index', compact(['tugass']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materis = Materi::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('pengajar.tugas.create', compact('materis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'nullable|string|max:255', // Pastikan validasi string
            'judul_tugas' => 'required|string|max:255',
            'id_materi' => 'nullable|exists:materi,id_materi',
            'deskripsi' => 'nullable|string', // Tambahkan validasi untuk deskripsi
            'file' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,svg,mp4,avi,mpeg,pdf,doc,docx,xls,xlsx,txt,zip', // Memperbolehkan berbagai jenis file
            'status' => 'required|boolean'
        ]);


        $videoName = null;

        if($request->hasFile('file')) {
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move(base_path('public_html/files_tugas'), $videoName);
        }

        Tugas::create([
            'url' => $request->url,
            'judul_tugas' => $request->judul_tugas,
            'deskripsi' => $request->deskripsi,
            'file' => $videoName,
            'id_materi' => $request->id_materi,
            'status' => $validated['status']
        ]);

        return response()->json([
            'url' => route('pengajar.tugas.index', ['id_materi' => $request->id_materi]),
            'success' => true,
            'message' => 'Data Tugas Berhasil Ditambah'
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
        $tugass = Tugas::findOrFail($id);

        $materis = Materi::all();

        return view('pengajar.tugas.edit', compact('tugass', 'materis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'url' => 'nullable|string|max:255',
            'id_materi' => 'nullable|exists:materi,id_materi', // Validasi id_program
            'deskripsi' => 'nullable|string', // Tambahkan validasi untuk deskripsi
            'status' => 'required|boolean'
        ]);

        $tugass = Tugas::findOrFail($id);
        
        if ($request->hasFile('file')) {

            if ($tugass->file) {
                $path = "./files_tugas/" . $tugass->file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $file = $request->file("file");
            $fileName = $file->getClientOriginalName();
            $file->move("./files_tugas/", $fileName);

            $tugass->file = $fileName;
        }

        $tugass->update([
            'url' => $request->url,
            'judul_tugas' => $request->judul_tugas,
            'deskripsi' => $request->deskripsi,
            'file' => $tugass->file,
            'id_materi' => $request->id_materi,
            'status' => $validated['status'],
        ]);

        return response()->json([
            'url' => route('pengajar.tugas.index', ['id_materi' => $request->id_materi]),
            'success' => true,
            'message' => 'Data Tugas Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugass = Tugas::findOrFail($id);
        
        if ($tugass->file) {
            $path = "./files_tugas/" . $tugass->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $tugass->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
