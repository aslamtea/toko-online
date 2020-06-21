@extends('user.tempat.header')

@section('judul')
    Halaman Cekout
@endsection


@section('header')
<style>
    .table th{
        vertical-align: middle;
    }
    .table td{
        vertical-align: middle;
    }
</style>
@endsection

@section('halaman')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('user/img')}}/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Halaman Cekout
        </h2>
    </section>
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-9  m-b-50">
                    <div class=" m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            @if (!empty($detail[0]))
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">Gambar</th>
                                        <th scope="col" class="text-center">Nama Produk</th>
                                        <th scope="col" class="text-center">Harga Barang</th>
                                        <th scope="col" class="text-center">stok</th>
                                        <th scope="col" class="text-center">
                                            <p class="texy-center">Jumlah Barang</p>
                                        </th>
                                        <th scope="col" class="text-center">Jumlah Harga</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $detail)
                                    <tr>
                                        <th scope="row">
                                            @if (!empty($detail->barang->gambar[0]))
                                            @foreach ($detail->barang->gambar as $item)
                                            <img src="{{asset('img/barang/'.$item->name)}}" alt="" class="img-thumbnail" width="100">
                                            @endforeach
                                            @else
                                            <img src="{{asset('img/pantai.jpg ')}}" alt="" class="img-thumbnail" width="100">

                                            @endif
                                        </th>

                                        <th scope="row" class="text-center">{{$detail->barang->name}}</th>
                                        <td class="text-center column-5">{{$detail->barang->harga}}</td>
                                        <td class="text-center column-5">{{$detail->barang->stok}}</td>
                                        <td class="text-center">
                                            <form action="/produk/{{$detail->id}}" method="POST" enctype="multipart/form-data">
                                                @method('patch') @csrf
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>
                                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah" value="{{$detail->jumlah}}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="input-group mt-2">
                                                    <button type="submit" name="simpan" value="true" class="btn btn-block btn-outline-dark bor13"> Update</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center">{{number_format($detail->jumlah_harga)}}</td>
                                        <td>
                                            <form action="/produk/{{$detail->id}}" method="POST" class="hapus-cu">
                                                @method('delete') @csrf
                                                <button type="submit" class="btn btn-danger hapus-ey">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h1 class="text-center">anda Belum Memesan Apapun</h1>
                            @endif
                        </div>
                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40  m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>
                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
									Total:
								</span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
									{{number_format($keranjang->jumlah_harga)}}
								</span>
                            </div>
                        </div>
                    <a href="/cek_out/pesan" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('footer')
<script>

  $("form.hapus-cu").submit(function(e){

      var form = this;
      e.preventDefault();

      Swal.fire({
          title: 'apakah anda yakin mau dihapus',
          text: "akan di hapus!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, ya hapus data!'
          }).then((result) => {
          if (result.value) {
             return form.submit();
          }
      })

  });

</script>
@endsection
