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


class GeneratepdfController extends Controller
{
    public function beri_nilai(Request $request){
        try {

            $sertifikat = Sertifikat::where('id_sertifikat', $request->id_sertifikat)->first();
            $user = User::where('id', $sertifikat->id_user)->first();
            $bootcamp = Bootcamp::where('id_bootcamp', $sertifikat->id_bootcamp)->first();
            $trainers = $bootcamp->trainer[0];

                $validated = $request->validate([
                    'nilai' => 'required'
                ]);

                $data = [
                    'email' => $user->email,
                    'nama_lengkap' => $user->nama_lengkap,
                    'judul_bootcamp' => $bootcamp->judul_bootcamp,
                    'nama_trainer' => $trainers->nama_trainer,
                    'ttd_trainer' => $trainers->ttd,
                    'nomor' => $sertifikat->no,
                    'nilai' => $validated['nilai'],
                    'title' => 'From grageacademy.online',
                    'body' => 'This is Certificate',
                ];

                $pdf = Pdf::loadView('myskill.pages.lainnya.sertifikat', $data)
                ->setPaper('a4', 'landscape');

                // Buat nama file dan simpan ke public/sertifikat
                $filename = 'sertifikat_' . Str::slug($user->nama_lengkap) . '_' . Str::slug($bootcamp->judul_bootcamp) . '.pdf';
                $pdf->save(base_path('public/sertifikat/' . $filename));


                $sertifikat->update([
                    'id_sertifikat' => $sertifikat->id_sertifikat,
                    'id_user' => $user->id,
                    'id_bootcamp' => $sertifikat->id_bootcamp,
                    'no' => $sertifikat->no,
                    'files' => 'sertifikat/' . $filename,
                    'nilai' =>$validated['nilai']
                ]);

            $data["pdf"] = $pdf;
            Mail::to($data["email"])->send(new MailSertifikat($data));

            return redirect()->back()->with('success', 'Data Sertifikat Berhasil Diperbarui');

        } catch (\Exception $e) {
            Log::error('Gagal mengirim sertifikat: ' . $e->getMessage());
        }
    }
}
