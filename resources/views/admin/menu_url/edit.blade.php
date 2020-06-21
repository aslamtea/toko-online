@extends('admin.tempat.header')

@section('judul')
    Edit Menu
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                        <div class="card-header">
                            <h1 class="text-center">Edit Menu</h1>
                          </div>
      <div class="card-body">
          <form class="form-horizontal" action="/admin/menu_url/{{$menu_url->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="submenu_id" class="col-sm-5 col-form-label">Menu id</label>
                <select name="submenu_id" id="submenu_id" class="form-control form-control-user @error('submenu_id') is-invalid @enderror" >
              @foreach ($submenu as $m)
                <option value="{{$m->id}}"
                    @if ($m->id == $menu_url->submenu_id)
                        selected
                    @endif
                    >{{$m->name}}</option>
              @endforeach
                </select>
                @error('submenu_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
              <div class="form-group">
                <label for="name" class="col-sm-5 col-form-label">name</label>
                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{$menu_url->name}}">
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="url" class="col-sm-5 col-form-label">Url</label>
                <input type="text" class="form-control  form-control-user @error('url') is-invalid @enderror" id="url" name="url" value="{{$menu_url->url}}">
                @error('url')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Menu</button>
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
  @endsection
