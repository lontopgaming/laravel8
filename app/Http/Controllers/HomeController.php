<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
 return view('user.dashboard.home');
        
    }

    public function hitungalumni()
    {   

    $alumniByAngkatan = Alumnus::select('angkatan')
                               ->selectRaw('COUNT(*) as jumlah_alumni')
                               ->groupBy('angkatan')
                               ->get();

    $alumniByDepartemen = Alumnus::select('departemen', 'angkatan')
        ->selectRaw('COUNT(*) as jumlah_alumni')
        ->groupBy('departemen', 'angkatan')
        ->get();

        $alumniByKategori = Alumnus::select('kategori_pekerjaan')
                               ->selectRaw('COUNT(*) as jumlah_alumni')
                               ->groupBy('kategori_pekerjaan')
                               ->get();

    // Format data untuk angkatan
    $formattedAngkatan = [];
    foreach ($alumniByAngkatan as $data) {
        $formattedAngkatan[$data->angkatan] = $data->jumlah_alumni;
    }

    // Format data untuk kategori
    $formattedKategori = [];
    foreach ($alumniByKategori as $data) {
        $formattedKategori[$data->kategori_pekerjaan] = $data->jumlah_alumni;
    }

    $formattedDepartemen = [];

    foreach ($alumniByDepartemen as $data) {
        $departemen = $data->departemen;
        $angkatan = $data->angkatan;
        $jumlahAlumni = $data->jumlah_alumni;

        if (!isset($formattedDepartemen[$departemen])) {
            $formattedDepartemen[$departemen] = [];
        }

        $formattedDepartemen[$departemen][$angkatan] = $jumlahAlumni;
    }

    $selectedDepartment = $_GET['departemen'] ?? null; // Ambil nilai departemen dari formulir (jika ada)

    $data = [
        'angkatan' => $formattedAngkatan,
        'departemen' => $formattedDepartemen,
        'kategori' => $formattedKategori,
    ];

        // dd($data);
        return view('user.dashboard.home', compact('data'));

    }
}
