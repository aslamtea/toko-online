@extends('toko.tempat.header')

@section('judul')
    Tambah produk
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">

            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Tambah produk</h1>
                  </div>
      <div class="card-body">
            <form class="form-horizontal" action="/toko/produk" method="POST" enctype="multipart/form-data">
              @csrf
              @method('post')

              <div class="form-group">
                <div class="text-center">
                    <input type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Nama produk">
                    @error('name')
                    <div class="invalid-feedback text-center">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
            </div>
              <div class="form-group">
               <div class="row justify-content-center">

                   <div class="col-lg-11">
                    <div class="text-center mt-2">
                        <input type="text" class="form-control  form-control-user @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga')}}" placeholder="Harga produk">
                        @error('harga')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center mt-2">
                        <input type="text" class="form-control  form-control-user @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{old('stok')}}" placeholder="stok produk">
                        @error('stok')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center mt-2">
                        <input type="text" class="form-control  form-control-user @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{old('berat')}}" placeholder="berat produk Gram">
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
                    <label for="isi"> Deskripsi produk</label>
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
                  <button type="submit" class="btn btn-primary">Tambah produk</button>
                  <a href="/toko/produk" class="btn btn-warning  mr-1">Kembali</a>
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

    @endsection
