<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Categori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['name'] = 'Blog';
        $this->sub_menu['m_url'] = 'Kategori Post';
    }

    public function index(Request $request)
    {
        $categori = Categori::all();
        if ($request->ajax()) {
            return datatables()->of($categori)
                ->addColumn('action', function ($categori) {
                    return view('admin.tempat._action', [
                        'show' => '',
                        'class' => '',
                        'detail' => '',
                        'edit' => '/admin/categori/' . $categori->id . '/edit',
                        'delete' => '/admin/categori/' . $categori->id . '',
                    ]);
                })
                ->rawColumns(['user', 'categori', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.categori.index', compact('categori'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categori.create', $this->sub_menu);
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
        $categori = Categori::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $categori->save();
        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/categori');
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
        $categori = Categori::findorfail($id);
        return view('admin.categori.edit', compact('categori'), $this->sub_menu);
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
        $categori = Categori::findorfail($id);
        $categori->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $categori->save();
        Alert::success('Data Berhasil Di Edit');
        return redirect('/admin/categori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categori = Categori::findorfail($id);
        $categori->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/categori');
    }
}
