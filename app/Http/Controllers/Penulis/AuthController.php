<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penulis\Penulis;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('penulis.auth.register');
    }
    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:pembeli',
            'password' => 'required|min:4',
            'konci1' => 'required|same:password'
        ]);


        Penulis::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Alert::success('Anda Sudah Mendaftarkan Diri', 'Silahkan Login');
        return redirect('/penulis/login');
    }
    public function login()
    {
        return view('penulis.auth.login');
    }
    public function masuk(Request $request)
    {


        if ($request->has('simpan')) {

            $data = Penulis::where('email', $request->input('email'))->first();

            if (!empty($data) && Hash::check($request->input('password'), $data->password)) {

                session([
                    'penulis_id'       => $data->email,
                    'password'    => $data->password,
                ]);
                Alert::success('Anda Berhasil Login', 'Terima Kasih');
                return redirect('/penulis/profil');
            } else {
                Alert::warning('Password Atau Email Salah', 'Terima Kasih');
                return back();
            }
        } else {
            Alert::warning('kunaon ey Atau Email Salah', 'Terima Kasih');

            return back();
        }
    }

    public function logout(Request $request)
    {
        if ($request->session()->exists('penulis_id')) {

            $request->session()->forget([
                'penulis_id',
                'password',
            ]);
            Alert::success('Anda Sudah Keluar', 'Terima Kasih');
            return redirect('/penulis/login');
        }
    }
}
