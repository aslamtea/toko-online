@extends('toko.tempat.header')

@section('judul')
    Profil
@endsection

@section('conten')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Profil</h1>
                </div>
                <div class="card-body">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{toko()->asaKau()}}">
                                        </div>
                                    <h3 class="profile-username text-center">{{toko()->name}}</h3>
                                    <p class="text-muted text-center">{{toko()->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="timeline">
                                <form class="form-horizontal" action="profil/" enctype="multipart/form-data" method="POST">
                                    @csrf @method('patch')
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{toko()->name}}"> @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{toko()->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <div class="col-sm-2">picture</div>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img src="{{toko()->asaKau()}}" class="img-thumbnail">
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" aria-describedby="inputGroupFileAddon04">
                                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">perbarui</button>
                                            <a href="/profil//edit" class="btn btn-warning">ganti password</a>
                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
