@extends('admin.tempat.header')

@section('judul')
    Create Menu_url
@endsection

@section('conten')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                        <div class="card-header">
                            <h1 class="text-center">Tambah Menu URl</h1>
                          </div>
      <div class="card-body">
            <form class="form-horizontal" action="/admin/menu_url" method="POST" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="form-group">
                <label for="submenu_id" class="col-sm-5 col-form-label">Url id</label>
                <select name="submenu_id" id="submenu_id" class="form-control form-control-user @error('submenu_id') is-invalid @enderror" >
                    <option value="">Select Menu</option>
              @foreach ($submenu as $m)
                <option value="{{$m->id}}">{{$m->name}}</option>
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
                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="url" class="col-sm-5 col-form-label">Url</label>
                <input type="text" class="form-control  form-control-user @error('url') is-invalid @enderror" id="url" name="url" value="{{old('url')}}">
                @error('url')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
                </>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Tambah kan</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection
