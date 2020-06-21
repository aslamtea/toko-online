@extends('admin.tempat.header')

@section('judul')
    Tambah Barang
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">

            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Tambah Barang</h1>
                  </div>
      <div class="card-body">
            <form class="form-horizontal" action="/admin/barang" method="POST" enctype="multipart/form-data">
              @csrf
              @method('post')

              <div class="form-group">
                <div class="text-center">
                    <input type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Nama Barang">
                    @error('name')
                    <div class="invalid-feedback text-center">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
            </div>
              <div class="form-group">
               <div class="row">
                   <div class="col-lg-6">
                    <div class="col-12 text-center mt-2">
                            <input type="file" class="custom-file-input form-control form-control-user @error('gambar_1') is-invalid @enderror" id="gambar_1" name="gambar_1" value="{{old('gambar_1')}}">
                                <label class="custom-file-label" for="gambar_1">Pilih Gambar Utama</label>
                                @error('gambar_1')
                                <div class="invalid-feedback text-center">
                                  {{$message}}
                                </div>
                                @enderror
                    </div>
                    <div class="col-12 text-center mt-2">
                            <input type="file" class="custom-file-input form-control form-control-user @error('gambar_2') is-invalid @enderror" id="gambar_2" name="gambar_2" value="{{old('gambar_2')}}">
                                <label class="custom-file-label" for="gambar_2">Pilih Gambar Samping</label>
                                @error('gambar_2')
                                <div class="invalid-feedback text-center">
                                  {{$message}}
                                </div>
                                @enderror
                    </div>
                    <div class="col-12 text-center mt-2">
                            <input type="file" class="custom-file-input form-control form-control-user @error('gambar_3') is-invalid @enderror" id="gambar_3" name="gambar_3" value="{{old('gambar_3')}}">
                                <label class="custom-file-label" for="gambar_3">Pilih Gambar Belakang</label>
                                @error('gambar_3')
                                <div class="invalid-feedback text-center">
                                  {{$message}}
                                </div>
                                @enderror
                    </div>

                    <div class="mt-2">
                        <select name="province_origin" id="province" class="form-control">
                            <option value="" holder>Pilih Provinsi</option>
                            @foreach($provinces as $province)
                            <option value="{{$province->id}}">{{$province->province}}</option>
                            @endforeach
                        </select>
                        @error('province_origin')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <select name="origin" id="origin" class="form-control" required>
                            <option value="" holder>Pilih Kota</option>
                        </select>
                        @error('origin')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>

                   </div>
                   <div class="col-lg-6">
                    <div class="text-center mt-2">
                        <input type="text" class="form-control  form-control-user @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga')}}" placeholder="Harga Barang">
                        @error('harga')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center mt-2">
                        <input type="text" class="form-control  form-control-user @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{old('stok')}}" placeholder="stok Barang">
                        @error('stok')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center mt-2">
                        <input type="text" class="form-control  form-control-user @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{old('berat')}}" placeholder="berat Barang Gram">
                        @error('berat')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <select name="kategori" id="kategori" class="form-control form-control-user @error('kategori') is-invalid @enderror">
                            <option value="">Select Kategori</option>
                      @foreach ($kategori as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                        </select>
                        @error('kategori')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <select name="merek" id="merek" class="form-control form-control-user @error('merek') is-invalid @enderror">
                            <option value="">Select Merek</option>
                      @foreach ($merek as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                        </select>
                        @error('merek')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                   </div>
               </div>
            </div>

                <div class="form-group mt-5">
                    <div class=" text-center">
                    <label for="isi"> Deskripsi Barang</label>
                    <textarea class="form-control form-control-user @error('isi') is-invalid @enderror" id="isi" name="isi" rows="3">{{old('isi')}}</textarea>
                    @error('isi')
                    <div class="invalid-feedback text-center">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Tambah Barang</button>
                  <a href="/admin/barang" class="btn btn-warning  mr-1">Kembali</a>
                </div>
              </div>
            </form>
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  </div>

    <!-- /.card -->
  <!-- /.container-fluid -->
  @endsection
  @section('footer')
  <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
  <script>
       CKEDITOR.replace( 'isi',{
          height: 200,
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
