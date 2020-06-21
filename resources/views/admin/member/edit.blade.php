@extends('admin.tempat.header')

@section('judul')
    Edit Member
@endsection

@section('conten')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Edit Member</h1>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="/admin/member/{{$member->id}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('patch')
                        <div class="form-group row">
                            <label for="name" class="col-sm-5 col-form-label">name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{$member->name}}"> @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-5 col-form-label">email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{$member->email}}" readonly> @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-5 col-form-label">role</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-user @error('role') is-invalid @enderror" id="role" name="role" value="{{$member->role}}"> @error('role')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-2">picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{$member->asaKau()}}" class="img-thumbnail">
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
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password" class="col-sm-5 col-form-label">Password</label>
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"> @error('password')
                                <div class="invalid-feedback ml-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="konci1" class="col-sm-8 col-form-label">Ulangi Password</label>
                                <input type="password" class="form-control form-control-user @error('konci1') is-invalid @enderror" id="konci1" name="konci1" placeholder="Uangin Password"> @error('konci1')
                                <div class="invalid-feedback ml-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-12">
                                <button type="submit" class="btn btn-primary">Edit Member</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
