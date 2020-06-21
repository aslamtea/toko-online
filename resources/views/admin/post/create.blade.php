@extends('admin.tempat.header')

@section('judul')
    Tambah Post
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
        <div class="card bg-gradient-light">
                        <div class="card-header">
                            <h1 class="text-center">Tambah Post</h1>
                          </div>
      <div class="card-body">
            <form class="form-horizontal" action="/admin/post" method="POST" enctype="multipart/form-data">
              @csrf
              @method('post')
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                        <select name="categori_id" id="categori_id" class="form-control form-control-user @error('categori_id') is-invalid @enderror">
                            <option value="">Select categori</option>
                      @foreach ($categori as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                        </select>
                        @error('categori_id')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-7">
                            <input type="file" class="custom-file-input form-control form-control-user @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{old('gambar')}}">
                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                @error('gambar')
                                <div class="invalid-feedback text-center">
                                  {{$message}}
                                </div>
                                @enderror
                        </div>
                  </div>
                </div>
                <div class="form-group">
                    <div class="card-body text-center">
                        <label for="judul" class="col-sm-5 col-form-label">Judul</label>
                        <input type="text" class="form-control  form-control-user @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{old('judul')}}">
                        @error('judul')
                        <div class="invalid-feedback text-center">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                </div>
                  <div class="form-group text-center">
                  <select class="select2 @error('p_tag') is-invalid @enderror" multiple="multiple" data-placeholder="Select tag" style="width: 100%;" name="p_tag[]">
                    @foreach($p_tag as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                  </select>
                  @error('p_tag')
                  <div class="invalid-feedback text-center">
                      {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="isi"> Isi Berita</label>
                <textarea class="form-control form-control-user @error('isi') is-invalid @enderror" id="isi" name="isi" rows="3">{{old('isi')}}</textarea>
                    @error('isi')
                    <div class="invalid-feedback text-center">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Tambah Post</button>
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
  <script src="{{asset('admin')}}/select2/js/select2.js"></script>
  <script>
    $('.select2').select2()
    $('.select2bs4').select2({
     theme: 'bootstrap4'
   })
 </script>


  <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
  <script>
       CKEDITOR.replace( 'isi',{
          height: 400,
          language: 'id', // id, es, en, dll
      } );
  </script>
    @endsection
