<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['name'] = 'Management bisnis';
        $this->sub_menu['m_url'] = 'Kategori';
    }

    public function index(Request $request)
    {
        $kategori = Kategori::all();
        if ($request->ajax()) {
            return datatables()->of($kategori)
                ->addColumn('action', function ($kategori) {
                    return view('admin.tempat._action', [
                        'show' => '',
                        'class' => '',
                        'detail' => '',
                        'edit' => '/admin/kategori/' . $kategori->id . '/edit',
                        'delete' => '/admin/kategori/' . $kategori->id . '',
                    ]);
                })
                ->rawColumns(['user', 'kategori', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.kategori.index', compact('kategori'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create', $this->sub_menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $categori = Kategori::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $categori->save();
        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/kategori');
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
        $kategori = Kategori::findorfail($id);
        return view('admin.kategori.edit', compact('kategori'), $this->sub_menu);
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
        $request->validate(['name' => 'required']);
        $kategori = Kategori::findorfail($id);
        $kategori->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        Alert::success('Data Berhasil Di Edit');
        return redirect('/admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findorfail($id);
        $kategori->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/kategori');
    }
}
