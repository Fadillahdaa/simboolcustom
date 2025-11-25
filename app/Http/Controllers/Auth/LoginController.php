<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('auth.administrator-login');
    }

    /**
     * Proses login (username & password)
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            // Cek role user
            $user = Auth::user();
            if ($user->role === 'superadmin') {
                return redirect()->intended('/superadmin/dashboard');
            } elseif ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // arahkan kembali ke halaman login administrator
        return redirect()->route('administrator-login');
    }

    /**
     * Gunakan kolom username untuk login (bukan email)
     */
    public function username()
    {
        return 'username';
    }
}
