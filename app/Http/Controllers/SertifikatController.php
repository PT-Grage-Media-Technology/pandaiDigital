<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log; // Tambahkan ini untuk mengatasi undefined type Log

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $id_sertifikat = $request->id_sertifikat; // Tambahkan ini
    
        $query = Sertifikat::query()->with(['user', 'bootcamp']); // Eager loading
    
        if (!empty($search)) {
            // Mencari berdasarkan id_user, nama_lengkap, dan judul_bootcamp
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($query) use ($search) {
                    $query->where('nama_lengkap', 'like', "%$search%");
                })
                ->orWhereHas('bootcamp', function($query) use ($search) {
                    $query->where('judul_bootcamp', 'like', "%$search%");
                });
            });
        }
    
        $sertifikats = $query->paginate(10); // Paginasi
    
        return view('administrator.sertifikat.index', compact('sertifikats'));
    }

    
    public function search($credentialNo)
    {
        // Cari sertifikat berdasarkan nomor credential dan include data bootcamp
        $sertifikat = Sertifikat::where('no', $credentialNo)->with('bootcamp', 'user')->first();

        // Jika sertifikat ditemukan, kirimkan data dalam format JSON
        if ($sertifikat) {
            return response()->json([
                'status' => 'success',
                'nama_user' => $sertifikat->user->nama_lengkap,
                'pemilik' => "Pemilik: " . $sertifikat->user->nama_lengkap,
                'foto_user' => asset('foto_user/' . $sertifikat->user->foto),
                'ucapan_selamat' => " Selamat kepada " . $sertifikat->user->nama_lengkap . "! Karena telah berhasil menyelesaikan bootcamp ini. Kerja Bagus!",
                'credential_no' => $sertifikat->no,
                'file_path' => $sertifikat->files,
                'id_bootcamp' => $sertifikat->bootcamp->id_bootcamp, // pastikan relasi ke bootcamp ada
                'judul_bootcamp' => $sertifikat->bootcamp->judul_bootcamp // pastikan relasi ke bootcamp ada
            ]);
        } else {
            // Jika sertifikat tidak ditemukan
            return response()->json(['status' => 'not_found']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */

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
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sertifikats = Sertifikat::findOrFail($id);
        $sertifikats->delete();

       //Hapus file video dari storage
        if ($sertifikats->files && file_exists(public_path("sertifikat/" . $sertifikats->files))) {
            unlink(base_path("public_html/sertifikat/" . $sertifikats->files));
        }

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
