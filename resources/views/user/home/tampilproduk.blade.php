@extends('user.tempat.header')
@section('judul')
{{$barang->slug}}
@endsection

@section('halaman')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('user/img')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Contact
    </h2>
</section>
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                            <div class="slick3 gallery-lb">
                                @if (!empty($gambar[0]))
                                @foreach ($gambar as $item)
                                <div class="item-slick3" data-thumb="{{asset('img/barang/'.$item->name)}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset('img/barang/'.$item->name)}}">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="item-slick3" data-thumb="{{asset('img/pantai.jpg ')}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset('img/pantai.jpg ')}}">
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$barang->name}}
                        </h4>
                        <h6 class="mtext-105 cl2 js-name-detail p-b-14">
                          Harga : Rp. {{number_format($barang->harga)}}
                        </h6>
                        <p class="mtext-105 cl2 js-name-detail p-b-14">
                           Stok Tersisa : {{$barang->stok}}
                        </p>
                        <span class="mtext-106 cl2">
						Berat Dalam Gram :	{{$barang->berat}}
						</span>

                        <p class="stext-102 cl3 p-t-23">
                           {!!$barang->isi!!}
                        </p>

                        <!--  -->
                        <div class="p-t-33">

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                <form action="/produk/{{$barang->id}}" method="post">
                                @csrf
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah_pesanan" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>

                                <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Add to cart
                                </button>
                                </form>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

            <span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
        </div>
    </section>

@endsection
