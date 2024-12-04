<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOTP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OTPVerificationController extends Controller
{
    public function verify(Request $request): RedirectResponse
{
    // Hapus OTP yang sudah kadaluarsa
    UserOTP::where('expired_at', '<', now())->delete();

    $request->validate([
        'otp_code' => ['required', 'numeric'],
        'otp_id' => ['required', 'exists:user_otps,id'],
    ], [
        'otp_id.exists' => 'Kode OTP sudah kadaluarsa, coba kirim ulang.', // Pesan kustom
    ]);

    $otpRecord = UserOTP::where('id', $request->otp_id)
                        ->where('otp_code', $request->otp_code)
                        ->first();

    if ($otpRecord) {
        if ($otpRecord->expired_at < now()) {
            // Jika OTP sudah kadaluarsa
            return back()->withErrors(['otp_code' => 'Kode OTP sudah kadaluarsa, coba kirim ulang.']);
        }

        // Ambil data pendaftaran dari sesi
        $registrationData = $request->session()->get('registration_data');

        // Buat user baru
        $user = User::create([
            'nama_lengkap' => $registrationData['nama_lengkap'],
            'username' => $registrationData['username'],
            'email' => $registrationData['email'],
            'password' => $registrationData['password'],
            'level' => 'user',
            'blokir' => 'N',
            'email_verified_at' => now(),
        ]);

        // Perbarui entri OTP dengan user_id
        $otpRecord->user_id = $user->id;
        $otpRecord->save();

        // Hapus data pendaftaran dari sesi
        $request->session()->forget('registration_data');

        // Login user
        Auth::login($user);

        // Tambahkan pesan sukses
        return redirect()->route('home')->with('status', 'Anda berhasil login.');
    }

    return back()->withErrors(['otp_code' => 'Kode OTP tidak valid atau sudah kadaluarsa.']);
}
}
