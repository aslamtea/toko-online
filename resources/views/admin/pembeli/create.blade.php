@extends('admin.tempat.header')

@section('judul')
    Tambah Pembeli
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Tambah Pembeli</h1>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="/admin/pembeli" method="POST" enctype="multipart/form-data">
                        @csrf @method('post')
                        <div class="form-group row">
                            <label for="name" class="col-sm-5 col-form-label">name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}"> @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control  form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}"> @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password" class="col-sm-5 col-form-label">Password</label>
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"> @error('password')
                                <div class="invalid-feedback ml-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="konci1" class="col-sm-8 col-form-label">Ulangi Password</label>
                                <input type="password" class="form-control form-control-user @error('konci1') is-invalid @enderror" id="konci1" name="konci1" placeholder="Uangin Password"> @error('konci1')
                                <div class="invalid-feedback ml-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <input type="file" class="custom-file-input  @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                                <label class="custom-file-label " for="gambar">Pilih Gambar</label> @error('gambar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-12">
                                <button type="submit" class="btn btn-primary">Buat Pembeli Baru</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
