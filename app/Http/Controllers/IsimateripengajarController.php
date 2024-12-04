<?php

namespace App\Http\Controllers;

use App\Models\Isimateri;
use App\Models\Materi;
use Illuminate\Http\Request;

class IsimateripengajarController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->search;
        $id_materi = $request->id_materi; // Tambahkan ini

        $query = Isimateri::query();

        if (!empty($search)) {
            $query->where('judul_file', 'like', "%$search%");
        }

        if (!empty($id_materi)) { // Tambahkan ini
            $query->where('id_materi', $id_materi);
        }

        $isi_materis = $query->paginate(10);

        return view('pengajar.isimateri.index', compact(['isi_materis']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materis = Materi::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('pengajar.isimateri.create', compact('materis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'nullable|string|max:255', // Pastikan validasi string
            'judul_file' => 'required|string|max:255',
            'id_materi' => 'nullable|exists:materi,id_materi',
            'file' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,svg,mp4,avi,mpeg,pdf,doc,docx,xls,xlsx,txt,zip', // Memperbolehkan berbagai jenis file
        ]);


        $videoName = null;

        if($request->hasFile('file')) {
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move(base_path('public_html/files'), $videoName);
        }

        Isimateri::create([
            'url' => $request->url,
            'judul_file' => $request->judul_file,
            'file' => $videoName,
            'id_materi' => $request->id_materi,
        ]);

        return response()->json([
            'url' => route('pengajar.isimateri.index', ['id_materi' => $request->id_materi]), // Mengarahkan ke halaman isi_materi
            'success' => true,
            'message' => 'Data Isi Materi Berhasil Ditambah'
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
        $isi_materis = Isimateri::findOrFail($id);

        $materis = Materi::all();

        return view('pengajar.isimateri.edit', compact('isi_materis', 'materis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'url' => 'required|string|max:255',
            'id_materi' => 'nullable|exists:materi,id_materi', // Validasi id_program
        ]);

        $isi_materis = Isimateri::findOrFail($id);
        
        if ($request->hasFile('file')) {

            if ($isi_materis->file) {
                $path = "./files/" . $isi_materis->file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $file = $request->file("file");
            $fileName = $file->getClientOriginalName();
            $file->move("./files/", $fileName);

            $isi_materis->file = $fileName;
        }

        $isi_materis->update([
            'url' => $request->url,
            'judul_file' => $request->judul_file,
            'file' => $isi_materis->file,
            'id_materi' => $request->id_materi,
        ]);

        return response()->json([
            'url' => route('pengajar.isimateri.index', ['id_materi' => $request->id_materi]),
            'success' => true,
            'message' => 'Data Isi Materi Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $isi_materis = Isimateri::findOrFail($id);
        
        if ($isi_materis->file) {
            $path = "./files/" . $isi_materis->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $isi_materis->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
