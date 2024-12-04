<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOTP;
use App\Notifications\SendOTPNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['error' => 'Email sudah terdaftar.'])->withInput();
        }
        
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'], // Tambahkan validasi untuk nama_lengkap
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        // Simpan data pendaftaran di sesi
        $request->session()->put('registration_data', [
            'nama_lengkap' => $request->nama_lengkap, // Simpan nama_lengkap
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Membuat kode OTP
        $otpCode = rand(100000, 999999);
        $otp = UserOTP::create([
            'otp_code' => $otpCode,
            'expired_at' => now()->addMinutes(3)
        ]);
    
        // Kirim OTP ke email
        Notification::route('mail', $request->email)->notify(new SendOTPNotification($otpCode));
    
        // Redirect ke halaman verifikasi OTP
        return redirect()->route('otp-verification', ['otp_id' => $otp->id])
                     ->with('status', 'Kode OTP dikirim ke emailmu.');
    }
    
    public function resendOTP(Request $request): RedirectResponse
    {
        $registrationData = $request->session()->get('registration_data');
    
        if (!$registrationData) {
            return redirect()->route('register')->withErrors(['error' => 'Data pendaftaran tidak ditemukan.']);
        }
    
        // Hapus OTP lama
        UserOTP::where('otp_code', $request->input('otp_code'))->delete();
    
        // Membuat kode OTP baru
        $otpCode = rand(100000, 999999);
        $otp = UserOTP::create([
            'otp_code' => $otpCode,
            'expired_at' => now()->addMinutes(3)
        ]);
    
        // Kirim OTP ke email
        Notification::route('mail', $registrationData['email'])->notify(new SendOTPNotification($otpCode));
    
        return redirect()->route('otp-verification', ['otp_id' => $otp->id])->with('status', 'Kode OTP baru telah dikirim.');
    }
}
