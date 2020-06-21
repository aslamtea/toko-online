@extends('admin.tempat.header')

@section('judul')
    Edit Akses
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                            <h1 class="text-center">Edit Akses</h1>
                          </div>
      <div class="card-body">
            <form class="form-horizontal" action="/admin/akses/{{$akses->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="role" class="col-sm-5 col-form-label">Role</label>
                <input type="text" class="form-control  form-control-user @error('role') is-invalid @enderror" id="role" name="role" value="{{$akses->role}}">
                @error('role')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="menu_id" class="col-sm-5 col-form-label">Menu id</label>
                <select name="menu_id" id="menu_id" class="form-control form-control-user @error('menu_id') is-invalid @enderror" >
                    @foreach ($menu as $m)
                    <option value="{{$m->id}}"
                        @if ($m->id == $akses->menu_id)
                            selected
                        @endif
                        >{{$m->name}}</option>
                  @endforeach
                </select>
                @error('menu_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Akses</button>
                </div>
              </div>
            </form>
            <a class="float-right" href="/admin/akses">Kembali</a>
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
