<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Merek;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class MerekController extends Controller
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
        $this->sub_menu['m_url'] = 'Merek';
    }

    public function index(Request $request)
    {
        $merek = Merek::all();
        if ($request->ajax()) {
            return datatables()->of($merek)
                ->addColumn('action', function ($merek) {
                    return view('admin.tempat._action', [
                        'show' => '',
                        'class' => '',
                        'detail' => '',
                        'edit' => '/admin/merek/' . $merek->id . '/edit',
                        'delete' => '/admin/merek/' . $merek->id . '',
                    ]);
                })
                ->rawColumns(['user', 'merek', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.merek.index', compact('merek'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merek.create', $this->sub_menu);
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
        $categori = Merek::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $categori->save();
        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/merek');
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
        $merek = Merek::findorfail($id);
        return view('admin.merek.edit', compact('merek'), $this->sub_menu);
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
        $merek = Merek::findorfail($id);
        $merek->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        Alert::success('Data Berhasil Di Edit');
        return redirect('/admin/merek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merek = Merek::findorfail($id);
        $merek->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/merek');
    }
}
