@extends('admin.tempat.header')

@section('judul')
    Tambah Menu
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
            <form class="form-horizontal" action="/admin/menu" method="POST" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="form-group">
                <label for="name" class="col-sm-5 col-form-label">name</label>
                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Tambah Menu</button>
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
