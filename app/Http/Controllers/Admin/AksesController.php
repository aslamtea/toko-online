<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Akses;
use App\Admin\Menu;
use RealRashid\SweetAlert\Facades\Alert;

class AksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['name'] = 'Menu Management';
        $this->sub_menu['m_url'] = 'Akses';
        $this->middleware('role');
    }

    public function index()
    {
        if (!auth()->user()->role == 'admin') {
            return redirect('/profil');
        }
        $akses = Akses::all();
        return view('admin.akses.index', compact('akses'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('admin.akses.create', compact('menu'), $this->sub_menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'menu_id' => 'required',
        ]);

        Akses::create($request->all());
        Alert::success('Data Berhasil Di Tambahkan', 'Coba Cek Kembali');
        return redirect('/admin/akses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::all();
        $akses = Akses::findorfail($id);
        return view('admin.akses.edit', compact('akses', 'menu'), $this->sub_menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
            'menu_id' => 'required',
        ]);
        $akses = Akses::findorfail($id);
        $akses->update($request->all());
        Alert::success('Data Berhasil Di Edit', 'Coba Cek Kembali');
        return redirect('/admin/akses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akses = Akses::findorfail($id);
        $akses->delete();

        Alert::success('Data Berhasil Di Hapus', 'Coba Cek kembali');
        return redirect('/admin/akses');
    }
}
