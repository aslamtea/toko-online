<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
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
        $this->sub_menu['m_url'] = 'member';
    }
    public function index(Request $request)
    {
        $member = User::all();
        if ($request->ajax()) {
            return datatables()->of($member)
                ->addColumn('action', function ($member) {
                    return view('admin.tempat._action', [
                        'show' => '/admin/member/' . $member->id . '',
                        'class' => 'badge badge-primary',
                        'detail' => 'Detail',
                        'edit' => '/admin/member/' . $member->id . '/edit',
                        'delete' => '/admin/member/' . $member->id . '',
                    ]);
                })
                ->rawColumns(['user', 'member', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.member.index', compact('member'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create', $this->sub_menu);
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
            'role' => 'required',
            'password' => 'required',
            'konci1' => 'required|same:password',
            'gambar' => 'required',
        ]);

        $member = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'gambar' => $request->gambar,
        ]);
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
            $member->gambar = $request->file('gambar')->getClientOriginalName();
            $member->save();
        }

        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/member');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::findorfail($id);
        return view('admin.member.show', compact('member'), $this->sub_menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = User::findorfail($id);
        return view('admin.member.edit', compact('member'), $this->sub_menu);
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
            'role' => 'required',
            'konci1' => 'same:password',
        ]);

        $member = User::findorfail($id);
        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'gambar' => $request->gambar,
        ]);
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
            $member->gambar = $request->file('gambar')->getClientOriginalName();
            $member->save();
        }

        Alert::success('Data Berhasil Di Rubah');
        return redirect('/admin/member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = User::findorfail($id);
        $member->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/member');
    }
}
