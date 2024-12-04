<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $remember = $request->has('remember');
        
        try {
            $request->authenticate();
            
            $user = Auth::user();
            $username = $request->input('username');
    
            session([
                'username' => $username,
                'id_session' => $user->id_session,
                'level' => $user->level
            ]);
            
            if ($remember) {
                Auth::login($user, true);
            }
    
            $request->session()->regenerate();
    
            // Mengarahkan pengguna berdasarkan peran
        if ($user->level === 'admin') {
            return redirect()->intended(route('dashboard'))->with('status', 'Anda berhasil login sebagai admin');
        } elseif ($user->level === 'pengajar') {
            return redirect()->intended(route('dashboard'))->with('status', 'Anda berhasil login sebagai pengajar');
        } else {
            return redirect()->intended(route('home'))->with('status', 'Anda berhasil login sebagai user');
        }
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('status', 'login-failed');
        }
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
