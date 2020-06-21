@extends('penulis.auth.tempat')

@section('judul')
    login
@endsection
@section('conten')

        <div class="row">
            <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Silahkan Masuk</h1>
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
              </div>
              <form class="user" method="POST" action="/penulis/login" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email" value="{{old('email')}}">
                      @error('email')
                      <span class="invalid-feedback ml-3" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan Password">
                    @error('password')
                    <div class="invalid-feedback ml-3">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                <button type="submit" name="simpan" class="btn btn-primary btn-user btn-block">Login</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Lupa Password ?</a>
              </div>
              <div class="text-center">
              <a class="small" href="{{url('/penulis/register')}}">Buat Akun Baru</a>
              </div>
            </div>
      </div>
      </div>
      @endsection
