<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    // Tampilkan form login administrator
    public function showLoginForm()
    {
        return view('auth.administrator-login');
    }

    // Proses login administrator
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Contoh login sederhana (sementara)
        if ($username === 'superadmin' && $password === '123456') {
            // Simulasi login sukses
            $request->session()->put('admin_logged_in', true);
            return redirect()->route('dashboard')->with('success', 'Selamat datang, Super Admin!');
        }

        // Jika gagal
        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    // Logout administrator
    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        return redirect()->route('administrator.login')->with('success', 'Berhasil logout');
    }
}