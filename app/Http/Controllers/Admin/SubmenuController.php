<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Submenu;
use App\Admin\Menu;
use RealRashid\SweetAlert\Facades\Alert;

class SubmenuController extends Controller
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
        $this->sub_menu['m_url'] = 'Submenu';
    }


    public function index()
    {
        $submenu = Submenu::all();
        return view('admin.submenu.index', compact('submenu'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        return view('admin.submenu.create', compact('menu'), $this->sub_menu);
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
            'menu_id' => 'required',
            'name' => 'required',
            'icon' => 'required',
        ]);

        Submenu::create($request->all());
        Alert::success('Data Berhasil DiTambahkan', 'Coba Cek List');
        return redirect('/admin/submenu');
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
        $submenu = Submenu::findorfail($id);
        return view('admin.submenu.edit', compact('submenu', 'menu'), $this->sub_menu);
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
            'menu_id' => 'required',
            'name' => 'required',
            'icon' => 'required',
        ]);

        $submenu = Submenu::findorfail($id);
        $submenu->update($request->all());
        Alert::success('Data Berhasil Di Ubah', 'Coba Cek Kembali');
        return redirect('/admin/submenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submenu = Submenu::findorfail($id);
        $submenu->delete();
        Alert::success('Data Berhasil Di Hapus', 'Coba Cek List');
        return redirect('/admin/submenu');
    }
}
