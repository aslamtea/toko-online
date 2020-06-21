@extends('user.tempat.header')


@section('judul')
    Cek Out
@endsection


@section('halaman')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('user/img')}}/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Proses Cekout
    </h2>
</section>
    <div class="container mt-3 mb-3">
        <div class="row mb-5 mt-3">
            <div class="col-lg-8 mt-4">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title text-center text-light">Detail Pengiriman</h3>
                    </div>
                    <div class="card-body">
                        <form  method="post" action="/cek_out/pesan">
                            @csrf
                            <h4 class="mb-5">Informasi Penerima</h4>
                            <div class="form-group">
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan  Nama Lengkap Anda Anda" value="{{old('nama_lengkap')}}"> @error('nama_lengkap')
                                <div class="invalid-feedback ml-3">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" placeholder="Masukan No Telepon  Anda" value="{{old('no_telepon')}}"> @error('no_telepon')
                                <div class="invalid-feedback ml-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="alamat" id="" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Anda"></textarea>
                                 @error('alamat')
                                <div class="invalid-feedback ml-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <h5 class="mb-5 mt-5">Pilih Alamat Pengiriman</h5>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <select name="province_origin" id="province" class="form-control @error('province_origin') is-invalid @enderror">
                                    <option value="" holder>Pilih Provinsi</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->province}}</option>
                                    @endforeach
                                </select> @error('province_origin')
                                    <div class="invalid-feedback text-center">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <select name="origin" id="origin" class="form-control @error('origin') is-invalid @enderror">
                                    <option value="" holder>Pilih Kota</option>
                                </select> @error('origin')
                                    <div class="invalid-feedback text-center">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <select name="courier"  class="form-control @error('courier') is-invalid @enderror">
                                        <option value="" holder>Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS</option>
                                    </select>
                                @error('courier')
                                <div class="invalid-feedback text-center">
                                    {{$message}}
                                </div>
                                @enderror
                                </div>
                            </div>

                            <h5 class="mb-5 mt-5">Informasi Transfer Bank</h5>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank" name="bank" placeholder="Nama Bank" value="{{old('bank')}}"> @error('bank')
                                    <div class="invalid-feedback ml-3">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control @error('rekening') is-invalid @enderror" id="rekening" name="rekening" placeholder="No Rekening" value="{{old('rekening')}}"> @error('rekening')
                                    <div class="invalid-feedback ml-3">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control @error('pemilik') is-invalid @enderror" id="pemilik" name="pemilik" placeholder="Pemilik Rekening" value="{{old('pemilik')}}"> @error('pemilik')
                                    <div class="invalid-feedback ml-3">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" placeholder="Catatan pengiriman" value="{{old('keterangan')}}"> @error('keterangan')
                                <div class="invalid-feedback ml-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4 mt-4 m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40  m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class=" ">
                            <span class="stext-110 cl2">
                                Jumlah Total: Rp {{number_format($keranjang->jumlah_harga)}}
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" placeholder="Coupon Code">
                    </div>
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
                    <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('footer')
    <script>
        $("form").submit(function(e){

            var form = this;
            e.preventDefault();

            Swal.fire({
                title: 'apakah anda yakin Dengan Registrasinya',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya Setuju '
                }).then((result) => {
                if (result.value) {
                   return form.submit();
            }
            })
        });
  </script>
   <script type="text/javascript">
    $(document).ready(function () {
        $('select[name="province_origin"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/toko/city/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="origin"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="origin"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="origin"]').empty();
            }
        });
    });

</script>
@endsection


