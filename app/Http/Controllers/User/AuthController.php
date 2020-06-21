<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User\Pembeli;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register()
    {
        return view('user.auth.register');
    }
    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:pembeli',
            'password' => 'required|min:4',
            'konci1' => 'required|same:password'
        ]);


        Pembeli::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Alert::success('Anda Sudah Mendaftarkan Diri', 'Silahkan Login');
        return redirect('/login');
    }
    public function login()
    {
        return view('user.auth.login');
    }
    public function masuk(Request $request)
    {


        if ($request->has('simpan')) {

            $data = Pembeli::where('email', $request->input('email'))->first();

            if (!empty($data) && Hash::check($request->input('password'), $data->password)) {

                session([
                    'id'       => $data->id,
                    'email'       => $data->email,
                    'password'    => $data->password,
                ]);
                Alert::success('Anda Berhasil Login', 'Terima Kasih');
                return redirect('/home');
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
        if ($request->session()->exists('email')) {

            $request->session()->forget([
                'id',
                'email',
                'password',
            ]);
            Alert::success('Anda Sudah Keluar', 'Terima Kasih');
            return redirect('/login');
        }
    }
}
