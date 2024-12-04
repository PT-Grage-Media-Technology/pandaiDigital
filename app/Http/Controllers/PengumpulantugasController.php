<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulantugas;
use App\Models\Tugas;
use App\Models\User;
use App\Models\Trainer;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PengumpulantugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $id_pengajar = Auth::user()->id;
         $trainer_login = Trainer::where('id', $id_pengajar)->first();
         
    if (isset($trainer_login)) {
        $search = $request->search;
        $email = $request->email; // Ubah dari judul_tugas ke nama_lengkap
        $id_tugas = $request->id_tugas;

        $query = Pengumpulantugas::query();

        if (!empty($search)) {
            $query->where('deskripsi', 'like', "%$search%");
        }

        if (!empty($emails)) {
            $query->whereHas('user', function ($q) use ($email) {
                $q->where('email', $email); // Filter berdasarkan nama lengkap user
            });
        }

        if (!empty($id_tugas)) {
            $query->where('id_tugas', $id_tugas);
        }

        $emails = User::select('email')
            ->groupBy('email')
            ->get(); // Mendapatkan daftar nama_lengkap dari user

        $pengumpulantugass = $query->with(['tugas', 'user'])->paginate(10);

        return view('pengajar.pengumpulantugas.index', compact(['pengumpulantugass', 'emails', 'trainer_login',  'id_pengajar']));
        }else{
            return view('pengajar.pengumpulantugas.index', compact(['trainer_login',  'id_pengajar']));
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
    public function tugasmateri(Request $request)
    {
        try {
            
            // Mengupload file
            if ($request->hasFile('file')) {
                // Menyimpan file ke storage
                $file = $request->file('file');
    
                // Get the original filename and sanitize it
                $originalName = $file->getClientOriginalName();
                $sanitizedFileName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $originalName); // Replace spaces and special chars
                
                // Move the file to files_pengumpulantugas with the sanitized filename
                $filePath = $file->move('files_pengumpulantugas', $sanitizedFileName);
    
                // Mengambil nama file tanpa direktori
                $fileName = basename($filePath);
    
                // Simpan data ke dalam tabel
                PengumpulanTugas::create([
                    'file' => $fileName, // hanya menyimpan nama file
                    'id_tugas' => $request->input('judul_tugas'),
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pengumpulan)
    {
        $pengumpulantugass = Pengumpulantugas::findOrFail($id_pengumpulan);

        $manajemenusers = User::all();
        $tugass = Tugas::all();

        return view('pengajar.pengumpulantugas.edit', compact('pengumpulantugass', 'tugass', 'manajemenusers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nilai' => 'required|numeric|integer',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file',
        ]);

        $pengumpulantugas = Pengumpulantugas::findOrFail($id);

        // Hapus file lama jika ada file baru yang diunggah
        if ($request->hasFile('file')) {
            if ($pengumpulantugas->file && file_exists(public_path("files_pengumpulantugas/" . $pengumpulantugas->file))) {
                unlink(public_path("files_pengumpulantugas/" . $pengumpulantugas->file));
            }
            $file = $request->file("file");
            $fileName = $file->getClientOriginalName();
            $file->move(public_path("files_pengumpulantugas"), $fileName);
            $pengumpulantugas->file = $fileName;
        }

        $pengumpulantugas->update([
            'nilai' => $validated['nilai'],
            'deskripsi' => $validated['deskripsi'],
            'file' => $pengumpulantugas->file,
        ]);

        return response()->json([
            'url' => route('pengajar.pengumpulantugas.index'),
            'success' => true,
            'message' => 'Data Pengumpulan Berhasil Dinilai'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pengumpulan)
    {
        //
        $pengumpulantugas = Pengumpulantugas::findOrFail($id_pengumpulan);
        if ($pengumpulantugas->file) {
            $path = "./files_pengumpulantugas/" . $pengumpulantugas->file;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $pengumpulantugas->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
