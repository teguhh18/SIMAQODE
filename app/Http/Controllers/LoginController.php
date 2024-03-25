<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\UserProvider;



class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {


        $credentials = $request->validate([
            // 'email' => 'required|email:dns',   untuk email ketat
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // dd('berhasl login');

        // login berhasil masuk home
        if(Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        // Gagal, kembali ke halaman login dan memberi pesan Login Failed.
        // Pesan disimpan di Sessiion
        // return back()->with('loginError', 'Login Failed');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
