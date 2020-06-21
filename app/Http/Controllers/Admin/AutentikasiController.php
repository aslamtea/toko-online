<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AutentikasiController extends Controller
{
    public function register()
    {
        return view('admin.autentikasi.register');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'konci1' => 'required|same:password'
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);
        Alert::success('Anda Sudah Mendaftarkan Diri', 'Silahkan Login');
        return redirect('/admin/login');
    }


    public function login()
    {
        return view('admin.autentikasi.login');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            Alert::success('Anda Berhasil Login', 'Terima Kasih');
            return redirect('/admin/profil');
        }
        return redirect()->back()->with("error", "password atau email Salah");
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Anda Sudah Logout', 'Terima Kasih');
        return redirect('/admin/login');
    }
}
