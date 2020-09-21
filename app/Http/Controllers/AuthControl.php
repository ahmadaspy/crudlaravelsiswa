<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControl extends Controller
{
    public function login(){
        return view('login.loginadmin');
    }
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/dash');
        }
        return redirect('/login')->with('gagal','Anda tidak terdaftar');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
