<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $data = $request->all();
        ///$data['password'] = bcrypt($data['password']);        
        ///dd($data);
        
        $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
        

        $credentials = [
            'login' => $data['login'],
            'password' => $data['password'],  
        ];

        ///die(print_r($credentials));

        if(Auth::attempt($credentials)){
            ///echo Auth::user()->name.'-';
            ///die('okk');
            return view('home');
        }else{
            ///die('error');
            return redirect()->back();
        }
    }

    public function getLogout() 
    {
        ///die('test logout!');
        Auth::logout();
        ///Session::flush();
        return redirect('/login');
    }
}
