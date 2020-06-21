<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\P_tag;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class P_tagController extends Controller
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
        $this->sub_menu['m_url'] = 'Tag Post';
    }

    public function index(Request $request)
    {
        $p_tag = P_tag::all();
        if ($request->ajax()) {
            return datatables()->of($p_tag)
                ->addColumn('action', function ($p_tag) {
                    return view('admin.tempat._action', [
                        'show' => '',
                        'class' => '',
                        'detail' => '',
                        'edit' => '/admin/p_tag/' . $p_tag->id . '/edit',
                        'delete' => '/admin/p_tag/' . $p_tag->id . '',
                    ]);
                })
                ->rawColumns(['user', 'p_tag', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.p_tag.index', compact('p_tag'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.p_tag.create', $this->sub_menu);
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

        $p_tag = P_tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        $p_tag->save();
        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/p_tag');
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
        $p_tag = P_tag::findorfail($id);
        return view('admin.p_tag.edit', compact('p_tag'), $this->sub_menu);
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

        $p_tag = P_tag::findorfail($id);
        $p_tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        $p_tag->save();
        Alert::success('Data Berhasil Di Rubah');
        return redirect('/admin/p_tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p_tag = P_tag::findorfail($id);
        $p_tag->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/p_tag');
    }
}
