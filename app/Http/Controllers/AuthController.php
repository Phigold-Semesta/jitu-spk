<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Session::has('id_pengguna')) {
            return Session::get('peran') === 'admin' 
                ? redirect()->route('admin.dashboard') 
                : redirect()->route('pegawai.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Menggunakan primary key id_pengguna dan tabel pengguna
        $user = Pengguna::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('id_pengguna', $user->id_pengguna);
            Session::put('nama_lengkap', $user->nama_lengkap);
            Session::put('peran', $user->peran);

            if ($user->peran === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
            } else {
                return redirect()->route('pegawai.dashboard')->with('success', 'Selamat datang, Pegawai!');
            }
        }

        return back()->withErrors(['username' => 'Username atau password salah!'])->withInput();
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Berhasil keluar dari sistem.');
    }
}
