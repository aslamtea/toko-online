<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User\Pembeli;
use RealRashid\SweetAlert\Facades\Alert;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['name'] = 'Dashboard';
        $this->sub_menu['m_url'] = 'Pembeli';
    }
    public function index(Request $request)
    {
        $pembeli = Pembeli::all();
        if ($request->ajax()) {
            return datatables()->of($pembeli)
                ->addColumn('action', function ($pembeli) {
                    return view('admin.tempat._action', [
                        'show' => '/admin/pembeli/' . $pembeli->id . '',
                        'class' => 'badge badge-primary',
                        'detail' => 'Detail',
                        'edit' => '/admin/pembeli/' . $pembeli->id . '/edit',
                        'delete' => '/admin/pembeli/' . $pembeli->id . '',
                    ]);
                })
                ->rawColumns(['user', 'pembeli', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pembeli.index', compact('pembeli'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pembeli.create', $this->sub_menu);
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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'konci1' => 'required|same:password',
            'gambar' => 'required',
        ]);

        $pembeli = Pembeli::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gambar' => $request->gambar,
        ]);
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img/pembeli/', $request->file('gambar')->getClientOriginalName());
            $pembeli->gambar = $request->file('gambar')->getClientOriginalName();
            $pembeli->save();
        }

        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/pembeli');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = Pembeli::findorfail($id);
        return view('admin.pembeli.show', compact('pembeli'), $this->sub_menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembeli = Pembeli::findorfail($id);
        return view('admin.pembeli.edit', compact('pembeli'), $this->sub_menu);
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
            'konci1' => 'same:password',
        ]);

        $pembeli = Pembeli::findorfail($id);
        $pembeli->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img/pembeli/', $request->file('gambar')->getClientOriginalName());
            $pembeli->gambar = $request->file('gambar')->getClientOriginalName();
            $pembeli->save();
        }

        Alert::success('Data Berhasil Di Rubah');
        return redirect('/admin/pembeli');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = Pembeli::findorfail($id);
        $pembeli->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/pembeli');
    }
}
