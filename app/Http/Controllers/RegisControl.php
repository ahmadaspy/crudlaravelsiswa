<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisControl extends Controller
{
    public function regisform()
    {
        return view('login.registeradmin');
    }
    public function regis_store(Request $request)
    {
        
        $user = new User;
        $user->level = 'admin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->remember_token = Str::random(40);
        $user->save();


        // $request->request->add(['level' => 'admin']);
        // $request->request->add(['remember_token' => 'Str::random(40)']);
        // $user = user::create($request->all());

        Auth::login($user);
        return redirect('/dash');
        
        

    }
}
