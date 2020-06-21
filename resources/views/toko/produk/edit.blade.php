@extends('toko.tempat.header')

@section('judul')
    Edit Post
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-gradient-light mb-2">
                <div class="card-header">
                    <h1 class="text-center">Tambah Gambar Produk</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container-fluid">
                            @if (!empty($gambar[0]))
                            <div class="row justify-content-end">
                                @foreach ($gambar as $gambar)
                                <div class="col-lg-3">
                                    <div class="card mt-3">
                                        <td>
                                            <img src="{{asset('img/barang/'.$gambar->name)}}" alt=""  height="300">
                                        </td>
                                        <div class="row justify-content-center mt-2 mb-2">
                                            <form action="/toko/produk/upload/{{$gambar->id}}" method="POST" class="d-inline" id="hapus-ey">
                                                @method('delete') @csrf
                                                <button type="submit" class="btn btn-danger text-center">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="row justify-content-center">
                                <div class="card-body">
                                    <h1 class="text-center">Produk Belum Memiliki Foto</h1>
                                    <h1 class="text-center">Silahkan Tambahkan Beberapa Foto</h1>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body ml-5">
                    <form class="form-horizontal" action="/toko/produk/upload/{{$produk->id}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('post')
                        <div class="form-group row justify-content-end">
                            <div class="col-md-4 offset-md-3 mr-5">
                                <input type="file" class="custom-file-input form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                                <label class="custom-file-label" for="name">Pilih Gambar</label> @error('name')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary mb-2">Tambah Gambar</button>
                                <a href="/toko/produk" class="btn btn-warning mr-1">Kembali Ke Halaman</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Edit Produk</h1>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="/toko/produk/{{$produk->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @method('patch')
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Produk</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control  form-control-user @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$produk->name}}"> @error('nama')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Harga Produk</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control  form-control-user @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{$produk->harga}}"> @error('harga')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Stok Produk</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control  form-control-user @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{$produk->stok}}"> @error('stok')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Berat Produk</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control  form-control-user @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{$produk->berat}}"> @error('berat')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Merek Produk</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="merek" id="merek" class="form-control form-control-user @error('merek') is-invalid @enderror">
                                @foreach ($merek as $m)
                                <option value="{{$m->id}}"
                                    @if ($m->id == $produk->merek_id)
                                    selected
                                    @endif
                                    >{{$m->name}}</option>
                                    @endforeach
                                </select> @error('merek')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Kategori Produk</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select name="kategori" id="kategori" class="form-control form-control-user @error('kategori') is-invalid @enderror">
                                @foreach ($kategori as $m)
                                <option value="{{$m->id}}"
                                    @if ($m->id == $produk->kategori_id)
                                    selected
                                    @endif
                                    >{{$m->name}}</option>
                                    @endforeach
                                </select> @error('kategori')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="text-center">Deskripsi Barang</h6>
                                </div>
                                <div class="col-12 text-center  mt-2 mb-2">
                                    <textarea class="form-control form-control-user @error('isi') is-invalid @enderror" id="isi" name="isi" rows="3">{{$produk->isi}}</textarea> @error('isi')
                                    <div class="invalid-feedback text-center">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">Edit Post</button>
                                <a href="/toko/produk" class="btn btn-warning  mr-1">Kembali Ke Halaman</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('footer')
  <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
  <script>
       CKEDITOR.replace( 'isi',{
          height: 200,
          language: 'id', // id, es, en, dll
      } );
  </script>
    @endsection
