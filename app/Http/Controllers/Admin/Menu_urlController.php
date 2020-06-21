<?php

namespace App\Http\Controllers\Admin;

use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Menu_url;
use App\Admin\Submenu;

class Menu_urlController extends Controller
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
        $this->sub_menu['m_url'] = 'Menu url';
    }

    public function index(Request $request)
    {

        $menu_url = Menu_url::all();
        if ($request->ajax()) {
            return datatables()->of($menu_url)
                ->addColumn('menu', function ($s) {
                    return $s->submenu->menu->name;
                })
                ->addColumn('submenu', function ($s) {
                    return $s->submenu->name;
                })
                ->addColumn('action', function ($menu_url) {
                    return view('admin.tempat._action', [
                        'show' => '',
                        'class' => '',
                        'detail' => '',
                        'edit' => '/admin/menu_url/' . $menu_url->id . '/edit',
                        'delete' => '/admin/menu_url/' . $menu_url->id . '',
                    ]);
                })
                ->rawColumns(['menu', 'submenu', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.menu_url.index', compact('menu_url'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $submenu = Submenu::all();
        return view('admin.menu_url.create', compact('submenu'), $this->sub_menu);
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
            'name' => 'required',
            'url' => 'required',
            'submenu_id' => 'required',
        ]);

        Menu_url::create($request->all());

        Alert::success('Data Berhasil Di Tambahkan', 'Coba Cek Kembali');

        return redirect('/admin/menu_url');
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

        $submenu = Submenu::all();
        $menu_url = Menu_url::findorfail($id);
        return view('admin.menu_url.edit', compact('submenu', 'menu_url'), $this->sub_menu);
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
            'name' => 'required',
            'url' => 'required',
            'submenu_id' => 'required',
        ]);

        $menu_url = Menu_url::findorfail($id);
        $menu_url->update($request->all());
        Alert::success('Data Berhasil Di Rubah', 'Coba Cek Kembali');
        return redirect('/admin/menu_url');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu_url = Menu_url::findorfail($id);
        $menu_url->delete();
        Alert::success('sudah dihapus', 'cek kembali');
        return redirect('/admin/menu_url');
    }
}
