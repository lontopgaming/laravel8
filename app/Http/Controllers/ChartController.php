<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        // $search = $request->input('search');
        // $query = User::where('role', 'User');

        // if ($search) {
        //     $query->where(function ($query) use ($search) {
        //         $query->where('name', 'LIKE', '%' . $search . '%')
        //             ->orWhere('email', 'LIKE', '%' . $search . '%');
        //     });
        // }

        // $users = $query->paginate(10);

        return view('master.dashboard.chart');
        // return view('master.dashboard.chart', compact('users', 'search'));
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

        if ($selectedDepartment) {
            // Departemen telah dipilih, Anda dapat menyesuaikan data berdasarkan departemen yang dipilih
            switch ($selectedDepartment) {
                case 'Ilmu Ekonomi':
                    // Proses data departemen Ilmu Ekonomi
                    $alumniData = $data['departemen']['Ilmu Ekonomi'] ?? null;
                    break;
                case 'Manajemen':
                    // Proses data departemen Manajemen
                    $alumniData = $data['departemen']['Manajemen'] ?? null;
                    break;
                case 'Akuntansi':
                    // Proses data departemen Akuntansi
                    $alumniData = $data['departemen']['Akuntansi'] ?? null;
                    break;
                default:
                    // Departemen tidak valid, mungkin melakukan penanganan kesalahan atau menampilkan data umum
                    $alumniData = null;
                    break;
            }
        } else {
            // Tidak ada departemen yang dipilih, mungkin menampilkan data umum
            $alumniData = null;
        }


        $data = [
            'angkatan' => $formattedAngkatan,
            'departemen' => $formattedDepartemen,
            'kategori' => $formattedKategori,
        ];
    

        // dd($data);
        return view('master.dashboard.chart', compact('data'));

    }
}
