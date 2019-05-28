<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Users;

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
        $username   = $request->input('username');
        $password   = sha1($request->input('password'));

        $users      = Users::where('username', $username)->first();
        // dd($users);
        if($users){
            if(Hash::check($password, $users->password)){
                $request->session()->put('id', $users->id);
                $request->session()->put('name', $users->name);
                $request->session()->put('username', $users->username);
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
        // Session::flush();
        session()->flush();
        return redirect('/login');
    }
}
