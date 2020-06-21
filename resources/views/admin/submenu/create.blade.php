@extends('admin.tempat.header')

@section('judul')
    Tambah Submenu
@endsection

@section('conten')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                        <div class="card-header">
                            <h1 class="text-center">Tambah Submenu</h1>
                          </div>
      <div class="card-body">
            <form class="form-horizontal" action="/admin/submenu" method="POST" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="form-group">
                <label for="menu_id" class="col-sm-5 col-form-label">Menu id</label>
                <select name="menu_id" id="menu_id" class="form-control form-control-user @error('menu_id') is-invalid @enderror" >
                    <option value="">Select Menu</option>
              @foreach ($menu as $m)
                <option value="{{$m->id}}">{{$m->name}}</option>
              @endforeach
                </select>
                @error('menu_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
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
                <label for="icon" class="col-sm-5 col-form-label">Icon</label>
                <input type="text" class="form-control  form-control-user @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{old('icon')}}">
                @error('icon')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Tambah Submenu</button>
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
