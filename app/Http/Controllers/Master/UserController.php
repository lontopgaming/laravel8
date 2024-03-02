<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Models\Master\UserModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function store(Request $request)
    {
        $request -> only([
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
        ]);
        
        try {
            $request['password'] = Hash::make($request['password']);
            
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'error' => $th->getMessage()
            ];
        }
        $payload = [
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => $request['password'],
        ];
        // dd($payload);
        $createdModel = $this->userModel->store($payload);

        if($createdModel){
            return redirect('/admin');
        }

        return back()->withErrors([
            'Error' => 'email atau kata sandi salah'
        ]);
    }


    public function update(Request $request)
    {
        $request -> only([
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
        ]);

        try {
            $request['password'] = Hash::make($request['password']);

        } catch (\Throwable $th) {
            return [
                'status' => false,
                'error' => $th->getMessage()
            ];
        }
    }

    public function index(){
        
    }

    public function delete(){

    }
}
