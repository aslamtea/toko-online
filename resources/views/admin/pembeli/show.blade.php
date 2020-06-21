@extends('admin.tempat.header')

@section('judul')
    Pembeli
@endsection

@section('conten')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-6">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                src="{{$pembeli->asaKau()}}" >
                </div>
            <h3 class="profile-username text-center">{{$pembeli->name}}</h3>
            <h3 class="profile-username text-center">{{$pembeli->email}}</h3>
                <a href="/admin/pembeli" class="btn btn-primary">kembali</a>
            </div>
            </div>
    </div>
</div>
</div>

  @endsection

