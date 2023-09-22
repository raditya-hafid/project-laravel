<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    public function index()
    {
        return view('reglogin.login',[
            'title'=>'Sign in',
        ]);
    }

    public function login(Request $request)
    {
        $credentials=$request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dash');
        }

        return back()->with('gagal' , 'Sign In Gagal!!');

        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }







    public function register()
    {
        return view('reglogin.register',[
            'title'=>'Sign up',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'username'=>'required|min:3|max:255|unique:users',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:8|max:255'
        ]);

        // $validatedData['password']= bcrypt($validatedData['password']); //cara kedua tambahkan ini
        // $validatedData['password']= Hash::make($validatedData['password']); //cara ketiga ATAU tambahkan ini

        User::create($validatedData); //cara pertama langsung ini
        // $request->session()->flash('success','Berhasil Mendaftar!!'); //error
        return redirect('/login')->with('success','Berhasil Mendaftar!!');
    }
}
