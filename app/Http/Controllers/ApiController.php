<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function hitungalumni()
    {   


            $alumniByKategori = Alumnus::select('kategori_pekerjaan')
                    ->selectRaw('COUNT(*) as jumlah_alumni')
                    ->groupBy('kategori_pekerjaan')
                    ->get();
            // Format data untuk kategori
            $formattedKategori = [];
            foreach ($alumniByKategori as $data) {
            $formattedKategori[$data->kategori_pekerjaan] = $data->jumlah_alumni;
            }


            $data  
             = $formattedKategori
            ;

        // dd($data);
        return response()->json($data);

    }
}

