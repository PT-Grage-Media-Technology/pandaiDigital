<?php

namespace App\Http\Controllers;

use App\Mail\MailSertifikat;
use App\Models\Bootcamp;
use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Materibootcamp;
use App\Models\Sertifikat;
use App\Models\User;
use App\Models\Trainer;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


class ProgressController extends Controller
{
    
    public function download($file)
{
    // dd($file);
    $filePath = base_path('public_html/sertifikat/' . $file); // sesuaikan dengan direktori file Anda
    if (file_exists($filePath)) {
        return Response::download($filePath);
    } else {
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}

    public function watchMateri(Request $request)
    {
        // dd($request);
        // Memastikan user login
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
        }
    
        // Validasi data id_materi_bootcamp yang diterima dari form
        // $request->validate([
        //     'id_materi_bootcamp' => 'required|exists:materi_bootcamp,id_materi_bootcamp',
        // ]);
        
    
        $idMateri = $request->input('id_materi_bootcamp');
    
        // Mendapatkan materi dan id bootcamp terkait
        $materi = Materibootcamp::findOrFail($idMateri);
        $bootcampId = $materi->id_bootcamp;
    
        // Hitung jumlah total materi yang tersedia dalam bootcamp ini
        $totalMateri = Materibootcamp::where('id_bootcamp', $bootcampId)->count();
    
        // Cek jumlah progress user di bootcamp ini
        $progressCount = Progress::where('id_user', $user->id)
            ->where('id_bootcamp', $bootcampId)
            ->count();
    
        // Cek apakah materi sudah pernah ditonton
        $existingProgress = Progress::where([
            'id_user' => $user->id,
            'id_bootcamp' => $bootcampId,
            'id_materi' => $idMateri,
        ])->first();

        if ($existingProgress) {
            $existingProgress->touch();
            return redirect()->to("/program/preview_video?id={$idMateri}")
                ->with('info', 'Melanjutkan menonton materi...');
        }

        // Tambah progress baru
        Progress::create([
            'id_progress' => Str::uuid(),
            'id_user' => $user->id,
            'id_bootcamp' => $bootcampId,
            'id_materi' => $idMateri,
        ]);
    
        // Hitung progress terbaru
        $totalMateri = Materibootcamp::where('id_bootcamp', $bootcampId)->count();
        $progressCount = Progress::where('id_user', $user->id)
            ->where('id_bootcamp', $bootcampId)
            ->count();
        
        $progressPercentage = ($progressCount / $totalMateri) * 100;
    
        // Cek jika progress 100%, generate dan kirim sertifikat
        if ($progressPercentage == 100) {
            try {
                $user = User::where('username', session('username'))->first();
                $bootcamp = Bootcamp::with(['trainer'])->findOrFail($bootcampId);
                // dd($bootcamp);
                $trainers = $bootcamp->trainer[0];
                
                // Generate nomor sertifikat random
                $nomorSertifikat = mt_rand(1, 999999);
                // Generate PDF
                
                
                 // Cek apakah sertifikat untuk user dan bootcamp ini sudah ada
                $existingSertifikat = Sertifikat::where('id_user', $user->id)
                                                ->where('id_bootcamp', $bootcampId)
                                                ->first();
            
                if ($existingSertifikat) {
                    // Jika sudah ada, tampilkan alert
                    return redirect()->back()->with('success', "Anda Sudah Memiliki Sertifikat Untuk Bootcamp Ini.");
                }
        
                // Simpan data sertifikat ke database
                Sertifikat::create([
                    'id_sertifikat' => Str::uuid(),
                    'id_user' => $user->id,
                    'id_bootcamp' => $bootcampId,
                    'no' => $nomorSertifikat,
                ]);

            } catch (\Exception $e) {
                Log::error('Gagal mengirim sertifikat: ' . $e->getMessage());
            }
        }
    
        return redirect()->to("/program/preview_video?id={$idMateri}")
            ->with('success', "Progress diperbarui! ({$progressPercentage}% selesai)");
    }

    // public function createCertificate($user, $bootcampId)
    // {
    //     try {
    //         $bootcamp = Bootcamp::findOrFail($bootcampId);
            
    //         // Generate nomor sertifikat random
    //         $nomorSertifikat = mt_rand(1, 999999);
            
    //         // Generate PDF
    //         $data = [
    //             'email' => $user->email,
    //             'nama_lengkap' => $user->nama_lengkap,
    //             'nama_bootcamp' => $bootcamp->nama_bootcamp,
    //             'nomor' => $nomorSertifikat,
    //             'title' => 'From PandaiDigital.online',
    //             'body' => 'This is Demo',
    //         ]; 
            
    //         $pdf = Pdf::loadView('myskill.pages.lainnya.sertifikat', $data)
    //             ->setPaper('a4', 'landscape');
            
    //         // Buat nama file dan simpan ke public/sertifikat
    //         $filename = 'sertifikat_' . Str::slug($user->nama_lengkap) . '_' . Str::slug($bootcamp->nama_bootcamp) . '.pdf';
    //         $pdf->save(public_path('sertifikat/' . $filename));
        
    //         // Simpan data sertifikat ke database
    //         Sertifikat::create([
    //             'id_sertifikat' => Str::uuid(),
    //             'id_user' => $user->id,
    //             'id_bootcamp' => $bootcampId,
    //             'no' => $nomorSertifikat,
    //             'files' => 'sertifikat/' . $filename
    //         ]);

    //         // Kirim email sertifikat
    //         Mail::to($data["email"])->send(new MailSertifikat($data));
    //     } catch (\Exception $e) {
    //         Log::error('Gagal mengirim sertifikat: ' . $e->getMessage());
    //     }
    // }

        // Tambahkan method baru
    // public function showSertifikat()
    // {
    //     $user = Auth::user();
        
    //     // Ambil semua sertifikat milik user yang login
    //     $sertifikat = Sertifikat::with(['bootcamp'])
    //         ->where('id_user', $user->id)
    //         ->get();
        
    //     return view('myskill.pages.profile.sertifikat', compact('sertifikat'));
    // }

    public function getUserProgress($userId, $bootcampId)
    {
        // Ambil materi yang tersedia untuk bootcamp spesifik
        $totalMateri = Materibootcamp::where('id_bootcamp', $bootcampId)
            ->count();
            
        // Hitung progress user untuk bootcamp spesifik
        $completedMateri = Progress::where([
        'id_user' => $userId,
        'id_bootcamp' => $bootcampId
        ])->count();

        // Hitung persentase
        $percentage = $totalMateri > 0 ? ($completedMateri / $totalMateri * 100) : 0;

        return [
        'total' => $totalMateri,
        'completed' => $completedMateri,
        'percentage' => $percentage
        ];
    }
    

    public function checkProgress($bootcampId)
{
    $user = Auth::user();
    $progress = $this->getUserProgress($user->id, $bootcampId);
    
    return response()->json([
        'percentage' => $progress['percentage']
    ]);
}
}