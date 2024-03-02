<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnusController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->input('search');
        $angkatanSearch = $request->input('angkatanSearch');
        $query = Alumnus::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('departemen', 'LIKE', '%' . $search . '%')
                    ->orWhere('prodi', 'LIKE', '%' . $search . '%')
                    ->orWhere('pekerjaan', 'LIKE', '%' . $search . '%')
                    ->orWhere('nim', 'LIKE', '%' . $search . '%')
                    ->orWhere('kategori_pekerjaan', 'LIKE', '%' . $search . '%');
            });
        }

        if ($angkatanSearch) {
            $query->where(function ($query) use ($angkatanSearch) {
                $query->where('angkatan', 'LIKE', '%' . $angkatanSearch . '%');
            });
        }

        $alumni = $query->paginate(10);
        // $alumni = Alumnus::all();

        // dd($alumni);
        
        return view('master.dashboard.alumni', compact('alumni', 'search', 'angkatanSearch'));
    }

    public function destroy($id)
    {
        // Validasi data dari form
        try {
            $alumnus = Alumnus::findOrFail($id);

            $alumnus->delete();
    
            return redirect('/admin/alumni')->with('deleteSuccess', 'Data Alumni berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
        
    }
}
