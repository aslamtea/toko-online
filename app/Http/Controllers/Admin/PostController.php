<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Post;
use App\Admin\Categori;
use App\Admin\P_tag;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
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
        $this->sub_menu['m_url'] = 'Post';
    }


    public function index(Request $request)
    {
        $post = Post::all();
        if ($request->ajax()) {
            return datatables()->of($post)
                ->addColumn('user', function ($s) {
                    return $s->user->name;
                })
                ->addColumn('categori', function ($s) {
                    return $s->categori->name;
                })
                ->addColumn('action', function ($post) {
                    return view('admin.tempat._action', [
                        'show' => '/admin/post/' . $post->id . '',
                        'detail' => 'Detail',
                        'class' => 'badge badge-primary',
                        'edit' => '/admin/post/' . $post->id . '/edit',
                        'delete' => '/admin/post/' . $post->id . '',
                    ]);
                })
                ->rawColumns(['user', 'categori', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.post.index', compact('post'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Categori::all();
        $p_tag = P_tag::all();
        return view('admin.post.create', compact('categori', 'p_tag'), $this->sub_menu);
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
            'judul' => 'required',
            'categori_id' => 'required',
            'gambar' => 'required',
            'p_tag' => 'required',
            'isi' => 'required',
        ]);



        $post = Post::create([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'categori_id' => $request->categori_id,
            'gambar' => $request->gambar,
            'isi' => $request->isi,
            'slug' => Str::slug($request->judul),
        ]);
        $post->p_tag()->attach($request->p_tag);
        $request->file('gambar')->move('img/portfolio/', $request->file('gambar')->getClientOriginalName());
        $post->gambar = $request->file('gambar')->getClientOriginalName();
        $post->save();

        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p_tag = P_tag::all();
        $post = Post::findorfail($id);
        return view('admin.post.show', compact('p_tag', 'post'), $this->sub_menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori = Categori::all();
        $p_tag = P_tag::all();
        $post = Post::findorfail($id);
        return view('admin.post.edit', compact('categori', 'p_tag', 'post'), $this->sub_menu);
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
            'judul' => 'required',
            'categori_id' => 'required',
            'p_tag' => 'required',
            'isi' => 'required',
        ]);
        $post = Post::findorfail($id);
        $post->update([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'categori_id' => $request->categori_id,
            'gambar' => $request->gambar,
            'isi' => $request->isi,
            'slug' => Str::slug($request->judul),
        ]);
        $post->p_tag()->sync($request->p_tag);
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img/portfolio/', $request->file('gambar')->getClientOriginalName());
            $post->gambar = $request->file('gambar')->getClientOriginalName();
            $post->save();
        }

        Alert::success('Data Berhasil Di Di Ubah', 'Dengan Id  ' . $id . ' ');
        return redirect('/admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/post');
    }
}
