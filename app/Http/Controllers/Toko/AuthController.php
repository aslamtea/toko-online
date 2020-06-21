<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Toko\Toko;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Admin\Province;
use App\Admin\City;

class AuthController extends Controller
{
    public function register()
    {
        $provinces = Province::all();
        return view('toko.auth.register', compact('provinces'));
    }
    public function getCitiesAjax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);
    }
    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:toko',
            'origin' => 'required|min:3',
            'alamat' => 'required|min:5',
            'password' => 'required|min:4',
            'konci1' => 'required|same:password'
        ]);


        Toko::create([
            'name' => $request->name,
            'email' => $request->email,
            'city_id' => $request->origin,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ]);
        Alert::success('Anda Sudah Mendaftarkan Diri', 'Silahkan Login');
        return redirect('/toko/login');
    }
    public function login()
    {
        return view('toko.auth.login');
    }
    public function masuk(Request $request)
    {


        if ($request->has('simpan')) {

            $data = Toko::where('email', $request->input('email'))->first();

            if (!empty($data) && Hash::check($request->input('password'), $data->password)) {

                session([
                    'toko_id'       => $data->id,
                    'toko'       => $data->email,
                    'password'    => $data->password,
                ]);
                Alert::success('Anda Berhasil Login', 'Terima Kasih');
                return redirect('/toko/profil');
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
        if ($request->session()->exists('toko')) {

            $request->session()->forget([
                'toko_id',
                'toko',
                'password',
            ]);
            Alert::success('Anda Sudah Keluar', 'Terima Kasih');
            return redirect('toko/login');
        }
    }
}
