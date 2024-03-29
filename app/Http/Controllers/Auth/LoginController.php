<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Staff;

class LoginController extends Controller
{
    public function index(){
        if(Session::get('login')){
            return redirect('/');
        }else{
            return view('layouts.login');
        }
    }

    public function doLogin(Request $request){
        $email      = $request->input('email');
        $password   = sha1($request->input('password'));

        $users      = Staff::where('email', $email)
                            ->join('role AS r', 'r.id', '=', 'staff.role_id')
                            ->select('staff.*', 'r.name AS role_name')
                            ->first();

        if($users){
            if(Hash::check($password, $users->password)){
                $request->session()->put('id', $users->id);
                $request->session()->put('name', $users->name);
                $request->session()->put('role', $users->role_id);
                $request->session()->put('role_name', $users->role_name);
                $request->session()->put('email', $users->email);
                $request->session()->put('login', TRUE);
                return redirect('/');
            }else{
                return redirect('/login')->with('alert', 'Email or Password not match!');
            }
        }else{
            return redirect('/login')->with('alert', 'Email or Password not match!');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }
}
