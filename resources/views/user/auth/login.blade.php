@extends('user.tempat.header')

@section('judul')
Halaman Login
@endsection
@section('halaman')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('user/img')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Silahkan Login
    </h2>
</section>
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <h4 class="mtext-105 cl2 txt-center p-b-30">
                    Silahkan Login
                </h4>
                <form class="user" method="post" action="/login">
                    @csrf

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Masukan Email Anda">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Masukan Password Anda">
                    </div>

                    <button type="submit" name="simpan" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
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
