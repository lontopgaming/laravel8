<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAlumniController extends Controller
{
   public function index(Request $request)
    {

        $countIlmuEkonomi = Alumnus::where('departemen', 'Ilmu Ekonomi')->count();
        $countManajemen = Alumnus::where('departemen', 'Manajemen')->count();
        $countAkuntansi = Alumnus::where('departemen', 'Akuntansi')->count();
        $alumniByAngkatan = Alumnus::select('angkatan')->count();
                               

        $search = $request->input('search');
        $angkatanSearch = $request->input('angkatanSearch');
        $query = Alumnus::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('departemen', 'LIKE', '%' . $search . '%')
                    ->orWhere('prodi', 'LIKE', '%' . $search . '%')
                    ->orWhere('pekerjaan', 'LIKE', '%' . $search . '%');
            });
        }

        if ($angkatanSearch) {
            $query->where(function ($query) use ($angkatanSearch) {
                $query->where('angkatan', 'LIKE', '%' . $angkatanSearch . '%');
            });
        }

        $alumni = $query->paginate(10);
        $data = [
            'Ilmu Ekonomi' => $countIlmuEkonomi,
            'Manajemen' => $countManajemen,
            'Akuntansi' => $countAkuntansi,
            'total' => $alumniByAngkatan
        ];
        // $alumni = Alumnus::all();
        
        return view('user.dashboard.about', compact('alumni', 'search', 'angkatanSearch', 'data'));
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



    public function hitung(){
        $countIlmuEkonomi = Alumnus::where('departemen', 'Ilmu Ekonomi')->count();
        $countManajemen = Alumnus::where('departemen', 'Manajemen')->count();
        $countAkuntansi = Alumnus::where('departemen', 'Akuntansi')->count();
    }
}
