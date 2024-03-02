<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function index() {
        $user = Auth::user();

        $biodata = $user->alumnus;
    
        return view('user.dashboard.biodata', compact('user', 'biodata'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $user = Auth::user();

        // Validasi data dari form
        try {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:alumni',
                'no_hp' => 'nullable|max:15',
                'departemen' => 'required',
                'prodi' => 'required',
                'angkatan' => 'required|max:5',
                'pekerjaan' => 'nullable|max:255',
                'kategori_pekerjaan' => 'nullable|max:255',
            ]);
    
            // Simpan data baru ke basis data
            $alumnus = new Alumnus();
            $alumnus->user_id = $user->id;
            $alumnus->name = $validatedData['name'];
            $alumnus->email = $validatedData['email'];
            $alumnus->no_hp = $validatedData['no_hp'];
            $alumnus->departemen = $validatedData['departemen'];
            $alumnus->prodi = $validatedData['prodi'];
            $alumnus->angkatan = $validatedData['angkatan'];
            $alumnus->pekerjaan = $validatedData['pekerjaan'];
            $alumnus->kategori_pekerjaan = $validatedData['kategori_pekerjaan'];
    
            $alumnus->save();
    
            return redirect('/biodata')->with('storeSuccess', 'Biodata alumni berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
        
    }

    public function update(Request $request)
    {
        // dd($request);

        // Validasi data dari form
        try {
            $user = Auth::user();
            $alumnus = $user->alumnus;

            $rules = [
                'user_id' => 'required',
                'name' => 'required|max:255',
                'no_hp' => 'nullable|max:15',
                'departemen' => 'required',
                'prodi' => 'required',
                'angkatan' => 'required|max:5',
                'pekerjaan' => 'nullable|max:255',
            ];

            if ($request->email != $alumnus->email) {
                $rules['email'] = 'required|max:255|unique:alumni';
            }

            $validatedData = $request->validate($rules);
    
            // Update data ke basis data
            $alumnus->user_id = $user->id;
            $alumnus->name = $validatedData['name'];
            // $alumnus->email = $validatedData['email'];
            $alumnus->no_hp = $validatedData['no_hp'];
            $alumnus->departemen = $validatedData['departemen'];
            $alumnus->prodi = $validatedData['prodi'];
            $alumnus->angkatan = $validatedData['angkatan'];
            $alumnus->pekerjaan = $validatedData['pekerjaan'];

            $alumnus->email = $validatedData['email'] ?? $alumnus->email;
    
            $alumnus->save();
    
            return redirect('/biodata')->with('updateSuccess', 'Biodata alumni berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
        
    }
}
