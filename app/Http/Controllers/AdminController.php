<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Pengguna;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahAlternatif = Alternatif::count();
        $jumlahKriteria = Kriteria::count();
        $jumlahPegawai = Pengguna::where('peran', 'pegawai')->count();
        
        return view('admin.dashboard', compact('jumlahAlternatif', 'jumlahKriteria', 'jumlahPegawai'));
    }

    public function kriteriaIndex()
    {
        $kriterias = Kriteria::all();
        return view('admin.kriteria.index', compact('kriterias'));
    }

    public function alternatifIndex()
    {
        $alternatifs = Alternatif::all();
        return view('admin.alternatif.index', compact('alternatifs'));
    }
}
