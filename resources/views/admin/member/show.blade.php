@extends('admin.tempat.header')

@section('judul')
    Member
@endsection

@section('conten')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-6">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                src="{{$member->asaKau()}}" >
                </div>
            <h3 class="profile-username text-center">{{$member->name}}</h3>
            <h3 class="profile-username text-center">{{$member->email}}</h3>
                <p class="text-muted text-center">{{$member->role}}</p>
                <a href="/admin/member" class="btn btn-primary">kembali</a>
            </div>
            <!-- /.card-body -->
            </div>
    </div>
</div>
</div>

    <!-- /.card -->
  <!-- /.container-fluid -->
  @endsection

