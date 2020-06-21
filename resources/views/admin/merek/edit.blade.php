@extends('admin.tempat.header')

@section('judul')
    Edit Merek
@endsection

@section('conten')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                            <h1 class="text-center">Edit Merek</h1>
                          </div>
      <div class="card-body">
          <form class="form-horizontal" action="/admin/merek/{{$merek->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="name" class="col-sm-5 col-form-label">Name</label>
                  <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{$merek->name}}">
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Merek</button>
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
