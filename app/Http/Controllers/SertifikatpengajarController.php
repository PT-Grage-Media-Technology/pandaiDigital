<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log; // Tambahkan ini untuk mengatasi undefined type Log

class SertifikatpengajarController extends Controller
{


    public function index(Request $request)
{
    // Cek apakah user terautentikasi dan memiliki level 'pengajar'
    if (Auth::user()->level !== 'pengajar') {
        return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }

    // Ambil ID user yang sedang login
    $id_pengajar = Auth::user()->id;

    $search = $request->search;

    // Pastikan user memiliki relasi bootcamp.trainer sebelum melanjutkan
    $trainer = Trainer::where('id', $id_pengajar)->first();

    // Jika trainer tidak ditemukan, tampilkan pesan error
    if (!$trainer) {
        return redirect()->back()->with('error', 'Maaf ' . Auth::user()->username . ', anda belum menjadi trainer, segera hubungi admin untuk menambahkan diri anda menjadi trainer!.');
    }

    // Eager loading dan filter sertifikat berdasarkan trainer dengan id yang sesuai
    $query = Sertifikat::query()
        ->with(['user', 'bootcamp.trainer.pengajar'])
        ->whereHas('bootcamp.trainer', function ($query) use ($id_pengajar) {
            $query->where('id', $id_pengajar);
        });

    // Jika ada parameter pencarian
    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->whereHas('user', function ($query) use ($search) {
                $query->where('nama_lengkap', 'like', "%$search%");
            })
            ->orWhereHas('bootcamp', function ($query) use ($search) {
                $query->where('judul_bootcamp', 'like', "%$search%");
            });
        });
    }

    // Paginasi hasil pencarian
    $sertifikats = $query->paginate(10);

    return view('pengajar.sertifikat.index', compact('sertifikats'));
}


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
