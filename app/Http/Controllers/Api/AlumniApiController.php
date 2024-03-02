<?php

namespace App\Http\Controllers\Api;

use App\Models\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AlumniApiController extends Controller
{
    private $alumnus;
    
    public function __construct()
    {
        $this->alumnus = new Alumnus();
    }


    public function index(Request $request)
    {
        $filter = [
            'nama' => $request->nama ?? '',        
            'angkatan' => $request->angkatan ?? '',
            'id' => $request->id ?? '',
                  ];
        $listAlumni = $this->alumnus->getAll($filter, $request->itemperpage ?? 0, $request->sort ?? '');

        return response()->json($listAlumni);
    }
}
