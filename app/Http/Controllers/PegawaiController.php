<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function dashboard()
    {
        return view('pegawai.dashboard');
    }

    public function penilaianIndex()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        return view('pegawai.penilaian.index', compact('alternatifs', 'kriterias'));
    }

    public function penilaianStore(Request $request)
    {
        // Logika menyimpan nilai lapangan yang diinput pegawai
        // ...
        return redirect()->back()->with('success', 'Data penilaian lapangan berhasil disimpan.');
    }
}
