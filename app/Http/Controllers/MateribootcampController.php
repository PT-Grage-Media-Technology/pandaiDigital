<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\Materibootcamp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MateribootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $id_bootcamp = $request->id_bootcamp; // Tambahkan ini

        $query = Materibootcamp::query();

        if (!empty($search)) {
            $query->where('judul_file', 'like', "%$search%")->orWhere('url', 'like', "%$search%");
        }

        if (!empty($id_bootcamp)) { // Tambahkan ini
            $query->where('id_bootcamp', $id_bootcamp);
        }

        $materibootcamps = $query->with('bootcamp')->paginate(10); // Tambahkan relasi materi

        return view('administrator.materibootcamp.index', compact(['materibootcamps']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bootcamps = Bootcamp::all();
        // dd($programs); // Debugging // Mengambil semua data program
        return view('administrator.materibootcamp.create', compact('bootcamps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'nullable|string|max:255', // Pastikan validasi string
            'judul_file' => 'required|string|max:255',
            'file' => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/gif,image/svg+xml,video/mp4,video/avi,video/mpeg,application/pdf',
            'id_bootcamp' => 'required|exists:bootcamps,id_bootcamp',
        ]);

        // $data['id_bootcamp'] = Str::uuid();
        $videoName = null;

        if($request->hasFile('file')) {
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move(base_path('public_html/files_materibootcamps'), $videoName);
        }

        Materibootcamp::create([
            'url' => $request->url,
            'judul_file' => $request->judul_file,
            'file' => $videoName,
            'id_bootcamp' => $request->id_bootcamp,
            'live_date' => $request->live_date
        ]);

        return response()->json([
            'url' => route('administrator.materibootcamp.index', ['id_bootcamp' => $request->id_bootcamp]),
            'success' => true,
            'message' => 'Data Materi Bootcamp Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Materibootcamp $materibootcamp)
    {
        //
    }
    
    public function previewVideo(Request $request)
{
    // Ambil id dari query string
    $id = $request->query('id');

    // Ambil data materi berdasarkan id
    $materibootcamp = Materibootcamp::find($id); // Ganti dengan model yang sesuai

    // Pastikan materi ditemukan
    if (!$materibootcamp) {
        return redirect()->back()->with('error', 'Materi tidak ditemukan.');
    }

    // Ambil id_bootcamp dari materi yang ditemukan
    $id_bootcamp = $materibootcamp->id_bootcamp; // Menambahkan baris ini

    // Ambil semua data materi bootcamp berdasarkan id_bootcamp, kecuali materi yang sedang dipreview
    $allMateribootcamp = Materibootcamp::where('id_bootcamp', $id_bootcamp)
        ->where('id_materi_bootcamp', '!=', $id) // Tambahkan kondisi ini untuk mengecualikan id_materi_bootcamp
        ->get();

    // Kirim data ke view, baik data spesifik dan semua data
    return view('myskill.pages.program.preview_video', compact('materibootcamp', 'allMateribootcamp'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materibootcamps = Materibootcamp::findOrFail($id);

        $bootcamps = Bootcamp::all();

        return view('administrator.materibootcamp.edit', compact('materibootcamps', 'bootcamps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'url' => 'required|string|max:255',
            'id_bootcamp' => 'nullable|exists:bootcamps,id_bootcamp', // Validasi id_program
        ]);

        $materibootcamps = Materibootcamp::findOrFail($id);

        // Hapus video lama jika ada video baru yang diunggah
        if($request->hasFile('file')) {
            if ($materibootcamps->file && file_exists(public_path("files_bootcamps/" . $materibootcamps->file))) {
                unlink(public_path("files_bootcamps/" . $materibootcamps->file));
            }
            $video = $request->file("file");
            $videoName = $video->getClientOriginalName();
            $video->move(base_path('public_html/files_materibootcamps'), $videoName);
            $materibootcamps->file = $videoName;
        }

        $materibootcamps->update([
            'url' => $request->url,
            'judul_file' => $request->judul_file,
            'file' => $materibootcamps->file,
            'id_bootcamp' => $request->id_bootcamp,
            'live_date' => $request->live_date
        ]);

        return response()->json([
            'url' => route('administrator.materibootcamp.index', ['id_bootcamp' => $request->id_bootcamp]),
            'success' => true,
            'message' => 'Data Materi Bootcamp Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materibootcamps = Materibootcamp::findOrFail($id);
        $materibootcamps->delete();

       //Hapus file video dari storage
        if ($materibootcamps->file && file_exists(public_path("files/" . $materibootcamps->file))) {
            unlink(public_path("files/" . $materibootcamps->file));
        }

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
