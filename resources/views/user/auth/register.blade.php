@extends('user.tempat.header')

@section('judul')
Halaman Register
@endsection

@section('halaman')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('user/img')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
       Silahkan Daftar
    </h2>
</section>
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <h4 class="mtext-105 cl2 txt-center p-b-30">
                    Silahkan Daftar
                </h4>
                <form class="user" method="post" action="/register">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan  Nama Anda" value="{{old('name')}}"> @error('name')
                        <div class="invalid-feedback ml-3">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan  Email Anda" value="{{old('email')}}"> @error('email')
                        <div class="invalid-feedback ml-3">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan  Password Anda" value="{{old('password')}}"> @error('password')
                        <div class="invalid-feedback ml-3">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('konci1') is-invalid @enderror" id="konci1" name="konci1" placeholder="Ulang  Password Anda" value="{{old('konci1')}}"> @error('konci1')
                        <div class="invalid-feedback ml-3">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Login
                </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m  w-full-md">
                <img src="{{asset('img/pantai.jpg')}}" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
</section>

@endsection

