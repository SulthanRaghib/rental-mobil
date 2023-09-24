<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        $request->authenticate();

        $request->session()->regenerate();

        // buat berdasarkan role_id
        $role = Auth::user()->role_id;

        // jika role_id = 2 maka akan diarahkan ke halaman homepage
        if ($role == 2) {
            return redirect()->intended(RouteServiceProvider::HOME)->with('welcome', 'Selamat datang, ' . Auth::user()->nama . ' di aplikasi rental mobil.');
        } else if ($role == 1) {
            return redirect()->intended(RouteServiceProvider::DASHBOARD)->with('welcome', 'Selamat datang, ' . Auth::user()->nama . ' dan Selamat Bekerja Min.');
        } else if ($role == 3) {
            return redirect()->intended(RouteServiceProvider::DASHBOARD)->with('welcome', 'Selamat datang, ' . Auth::user()->nama . ' dan Semangat Bekerja.');
        }

        // jika role_id tidak sesuai maka akan diarahkan ke halaman login
        return redirect()->intended(RouteServiceProvider::HOME);
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
