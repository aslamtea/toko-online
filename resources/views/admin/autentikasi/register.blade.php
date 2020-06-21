@extends('admin.autentikasi.tempat')

@section('judul')
    register
@endsection

@section('conten')


        <div class="row">
            <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru  </h1>
              </div>
              <form class="user" method="post" action="/admin/register">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan  Nama Anda" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback ml-3">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email Anda" value="{{old('email')}}">
                  @error('email')
                  <div class="invalid-feedback ml-3">
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback ml-3">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user @error('konci1') is-invalid @enderror" id="konci1" name="konci1" placeholder="Uangin Password">
                    @error('konci1')
                    <div class="invalid-feedback ml-3">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Daftarkan Akun Baru</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{url('/admin/login')}}">Already have an account? Login!</a>
              </div>
            </div>
      </div>
      </div>
      @endsection
@section('footer')
    <script>
        $("form").submit(function(e){

            var form = this;
            e.preventDefault();

            Swal.fire({
                title: 'apakah anda yakin Dengan Registrasinya',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya Setuju '
                }).then((result) => {
                if (result.value) {
                   return form.submit();
            }
            })
        });
  </script>
@endsection
