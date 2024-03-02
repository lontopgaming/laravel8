<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = User::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('nim', 'LIKE', '%' . $search . '%');
            });
        }

        $users = $query->paginate(10);

        return view('master.dashboard.user', compact('users', 'search'));
    }

    public function store(Request $request)
    {
        // dd($request);

        // Validasi data dari form
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email:dns|max:255|unique:users',
                'password' => 'required|min:3|max:255',
            ]);
    
            $validatedData['password'] = Hash::make($validatedData['password']);
    
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = $validatedData['password'];
            $user->role = "User";
    
            $user->save();
    
            return redirect('/admin')->with('storeSuccess', 'Data User baru berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
        
    }

    public function update(Request $request, $id)
    {
        // dd($request);

        // Validasi data dari form
        try {
            $user = User::findOrFail($id);

            $rules = [
                'name' => 'required|max:255',
            ];

            if ($request->email != $user->email) {
                $rules['email'] = 'required|max:255|unique:users';
            }

            if (!empty($request->password)) {
                $rules['password'] = 'required|min:3|max:255';
            }

            $validatedData = $request->validate($rules);

            $user->name = $validatedData['name'];
            $user->role = "User";

            $user->email = $validatedData['email'] ?? $user->email;
            if (!empty($request->password)) {
                $user->password = Hash::make($validatedData['password']);
            }
    
            $user->save();
    
            return redirect('/admin')->with('updateSuccess', 'Data User berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
        
    }

    public function destroy($id)
    {
        // Validasi data dari form
        try {
            $user = User::findOrFail($id);

            $user->delete();
    
            return redirect('/admin')->with('deleteSuccess', 'Data User berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
        
    }
}
