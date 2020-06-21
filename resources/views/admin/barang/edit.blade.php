@extends('admin.tempat.header')

@section('judul')
    Edit Post
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Edit Post</h1>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="/admin/barang/{{$barang->id}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('patch')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="text-center">Nama Barang</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <input type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{$barang->name}}"> @error('name')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h6 class="text-center">Harga Barang</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <input type="text" class="form-control  form-control-user @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{$barang->harga}}"> @error('harga')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h6 class="text-center">Stok Barang</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <input type="text" class="form-control  form-control-user @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{$barang->stok}}"> @error('stok')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h6 class="text-center">Berat Barang</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <input type="text" class="form-control  form-control-user @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{$barang->berat}}"> @error('berat')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="text-center">Kategori Barang</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <select name="kategori" id="kategori" class="form-control form-control-user @error('kategori') is-invalid @enderror">
                                    @foreach ($kategori as $m)
                                    <option value="{{$m->id}}"
                                        @if ($m->id == $barang->kategori_id)
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
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h6 class="text-center">Merek Barang</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <select name="merek" id="merek" class="form-control form-control-user @error('merek') is-invalid @enderror">
                                    @foreach ($merek as $m)
                                    <option value="{{$m->id}}"
                                        @if ($m->id == $barang->merek_id)
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
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h6 class="text-center">Provinsi Asal</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <select name="province_origin" id="province" class="form-control form-control-user @error('province_origin') is-invalid @enderror">
                                    @foreach ($provinces as $m)
                                    <option value="{{$m->id}}"
                                        @if ($m->id == $barang->city->province_id)
                                        selected
                                        @endif
                                        >{{$m->province}}</option>
                                        @endforeach
                                    </select> @error('province_origin')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card mt-2">
                                        <div class="card-header">
                                            <h6 class="text-center">Kota Asal</h6>
                                        </div>
                                        <div class="col-12 text-center  mt-2 mb-2">
                                            <select name="origin" id="origin" class="form-control form-control-user @error('origin') is-invalid @enderror">
                                    @foreach ($city as $m)
                                    <option value="{{$m->id}}"
                                        @if ($m->id == $barang->kota)
                                        selected
                                        @endif
                                        >{{$m->city_name}}</option>
                                        @endforeach
                                    </select> @error('origin')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="text-center">gambar utama</h6>
                                        </div>
                                        <div class="col-11 text-center ml-2 mt-2 mb-2">
                                            <input type="file" class="custom-file-input form-control form-control-user @error('gambar_1') is-invalid @enderror" id="gambar_1" name="gambar_1">
                                            <label class="custom-file-label" for="gambar_1">{{$barang->gambar_1}}</label> @error('gambar_1')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <img src="{{asset('img/barang/'.$barang->gambar_1)}}" alt="" class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="text-center">gambar samping</h6>
                                        </div>
                                        <div class="col-11 text-center ml-2 mt-2 mb-2">
                                            <input type="file" class="custom-file-input form-control form-control-user @error('gambar_2') is-invalid @enderror" id="gambar_2" name="gambar_2">
                                            <label class="custom-file-label" for="gambar_2">{{$barang->gambar_2}}</label> @error('gambar_2')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <img src="{{asset('img/barang/'.$barang->gambar_2)}}" alt="" class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="text-center">gambar Belakang</h6>
                                        </div>
                                        <div class="col-11 text-center ml-2 mt-2 mb-2">
                                            <input type="file" class="custom-file-input form-control form-control-user @error('gambar_3') is-invalid @enderror" id="gambar_3" name="gambar_3">
                                            <label class="custom-file-label" for="gambar_3">{{$barang->gambar_3}}</label> @error('gambar_3')
                                            <div class="invalid-feedback text-center">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <img src="{{asset('img/barang/'.$barang->gambar_3)}}" alt="" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="text-center">Deskripsi Barang</h6>
                                </div>
                                <div class="col-12 text-center  mt-2 mb-2">
                                    <textarea class="form-control form-control-user @error('isi') is-invalid @enderror" id="isi" name="isi" rows="3">{{$barang->isi}}</textarea> @error('isi')
                                    <div class="invalid-feedback text-center">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit Post</button>
                                <a href="/admin/barang" class="btn btn-warning  mr-1">Kembali</a>
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
          height: 400,
          language: 'id', // id, es, en, dll
      } );
  </script>
   <script type="text/javascript">
    $(document).ready(function () {
        $('select[name="province_origin"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/admin/kota/' + cityId,
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
