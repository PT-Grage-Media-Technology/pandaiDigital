<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulantugasbootcamp;
use App\Models\Tugasbootcamp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Trainer;


class PengumpulantugasbootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $id_pengajar = Auth::user()->id;
        $trainer_login = Trainer::where('id', $id_pengajar)->first();
        
        if (isset($trainer_login)) {
            
        $search = $request->search;
        $email = $request->email; // Ubah dari judul_tugas ke nama_lengkap
        $id_tugas_bootcamp = $request->id_tugas_bootcamp;

        $query = Pengumpulantugasbootcamp::query();

        if (!empty($search)) {
            $query->where('deskripsi', 'like', "%$search%");
        }

        if (!empty($emails)) {
            $query->whereHas('user', function ($q) use ($email) {
                $q->where('email', $email); // Filter berdasarkan nama lengkap user
            });
        }

        if (!empty($id_tugas_bootcamp)) {
            $query->where('id_tugas_bootcamp', $id_tugas_bootcamp);
        }
        
        $id_pengajar = Auth::user()->id;
        $trainer_login = Trainer::where('id', $id_pengajar)->first();
        $emails = User::select('email')
            ->groupBy('email')
            ->get(); // Mendapatkan daftar nama_lengkap dari user

        // $pengumpulantugasbootcamps = $query->with(['tugas', 'user'])
        // ->get();
            $id_trainer = $trainer_login->id_trainer;
        
            // Query dengan filter dan paginasi
            $pengumpulantugasbootcamps = $query->with(['tugas', 'user', 'tugas.bootcamp'])
                ->whereHas('tugas.bootcamp', function ($query) use ($id_trainer) {
                    $query->where('id_trainer', $id_trainer); // Filter by id_trainer
                })
                ->paginate(10);
            return view('pengajar.pengumpulantugasbootcamp.index', compact(['pengumpulantugasbootcamps', 'trainer_login', 'emails']));
        } else {
            return view('pengajar.pengumpulantugasbootcamp.index', compact(['id_pengajar', 'trainer_login', 'id_pengajar']));
        }
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
        try {
            // Mengupload file
            if ($request->hasFile('file')) {
                // Menyimpan file ke storage
                $file = $request->file('file');

                // Get the original filename and sanitize it
                $originalName = $file->getClientOriginalName();
                $sanitizedFileName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $originalName); // Replace spaces and special chars

                // Move the file to files_pengumpulantugas with the sanitized filename
                $filePath = $file->move('files_pengumpulantugas_bootcamps', $sanitizedFileName);
                // dd($request);

                // Mengambil nama file tanpa direktori
                $fileName = basename($filePath);
                // dd($request->input('id_tugas'));
                // Simpan data ke dalam tabel
                Pengumpulantugasbootcamp::create([
                    'file' => $fileName, // hanya menyimpan nama file
                    'id_tugas' => $request->input('id_tugas'),
                    'id_user' => auth()->user()->id,
                    'deskripsi' => $request->input('deskripsi'),
                    'nilai' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                return redirect()->back()->with('success', 'Tugas berhasil dikirim!');
            }

            return redirect()->back()->with('error', 'Gagal mengirim tugas, file tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Error in storing task submission: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengirim tugas, terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumpulantugasbootcamp $pengumpulantugasbootcamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pengumpulan_bootcamp)
    {
        //
        $pengumpulantugasbootcamps = Pengumpulantugasbootcamp::findOrFail($id_pengumpulan_bootcamp);

        $manajemenusers = User::all();
        $tugasbotcamps = Tugasbootcamp::all();

        return view('pengajar.pengumpulantugasbootcamp.edit', compact('pengumpulantugasbootcamps', 'tugasbotcamps', 'manajemenusers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'nilai' => 'required|numeric|integer',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file',
        ]);

        $pengumpulantugasbootcamps = Pengumpulantugasbootcamp::findOrFail($id);

        // Hapus file lama jika ada file baru yang diunggah
        if ($request->hasFile('file')) {
            if ($pengumpulantugasbootcamps->file && file_exists(public_path("files_pengumpulantugas_bootcamps/" . $pengumpulantugasbootcamps->file))) {
                unlink(public_path("files_pengumpulantugas_bootcamps/" . $pengumpulantugasbootcamps->file));
            }
            $file = $request->file("file");
            $fileName = $file->getClientOriginalName();
            $file->move(public_path("files_pengumpulantugas_bootcamps"), $fileName);
            $pengumpulantugasbootcamps->file = $fileName;
        }

        $pengumpulantugasbootcamps->update([
            'nilai' => $validated['nilai'],
            'deskripsi' => $validated['deskripsi'],
            'file' => $pengumpulantugasbootcamps->file,
        ]);

        return response()->json([
            'url' => route('pengajar.pengumpulantugasbootcamp.index'),
            'success' => true,
            'message' => 'Data Pengumpulan Berhasil Dinilai'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pengumpulan_bootcamp)
    {
        //
        $pengumpulantugasbootcamps = Pengumpulantugasbootcamp::findOrFail($id_pengumpulan_bootcamp);
        if ($pengumpulantugasbootcamps->file) {
            $path = "./files_pengumpulantugas_bootcamps/" . $pengumpulantugasbootcamps->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $pengumpulantugasbootcamps->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
