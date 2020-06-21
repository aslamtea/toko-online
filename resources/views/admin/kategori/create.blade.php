@extends('admin.tempat.header')

@section('judul')
    Tambah Kategori
@endsection

@section('conten')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                        <div class="card-header">
                            <h1 class="text-center">Tambah Menu</h1>
                          </div>
                     <div class="card-body">
                        <form class="form-horizontal" action="/admin/kategori" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="name" class="col-form-label"><span>Name</span></label>
                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                        </div>
                        </form>
                 </div>
          </div><!-- /.card-body -->
    </div>
  </div>
</div>

    <!-- /.card -->
  <!-- /.container-fluid -->
  @endsection
