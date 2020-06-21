@extends('admin.tempat.header')

@section('judul')
    Detail Barang
@endsection

@section('conten')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-12">
        <div class="card bg-gradient-light">
            <div class="card-header">
                <h1 class="text-center">Detail Barang</h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="text-center">gambar utama</h6>
                            </div>
                            <img src="{{asset('img/barang/'.$barang->gambar_1)}}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="text-center">gambar samping</h6>
                            </div>
                            <img src="{{asset('img/barang/'.$barang->gambar_2)}}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="text-center">gambar belakang</h6>
                            </div>
                            <img src="{{asset('img/barang/'.$barang->gambar_3)}}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Kota Asal</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$barang->city->city_name}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Harga Barang</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">Rp : {{number_format($barang->harga)}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Stok Barang</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center"> {{$barang->stok}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Berat Barang</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center"> {{$barang->berat}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Pemilik Barang</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$barang->user->name}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Name</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$barang->name}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Slug Url</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$barang->slug}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Kategori Barang</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$barang->Kategori->name}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Merek Barang</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$barang->merek->name}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card shadow bg-light mt-3 mb-3">
                            <div class="card-header">
                                <h6 class="text-center">Deskripsi Barang</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{!!$barang->isi!!}</h6>
                            </div>
                        </div>
                        <a href="/admin/barang" class="btn btn-primary mb-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>

    <!-- /.card -->
  <!-- /.container-fluid -->
  @endsection

