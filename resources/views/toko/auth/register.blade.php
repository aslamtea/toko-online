@extends('toko.auth.tempat')

@section('judul')
Daftar Toko Baru register
@endsection

@section('conten')


<div class="row">
    <div class="col-lg">
        <div class="p-4">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Toko Baru </h1>
            </div>
            <form class="user" method="post" action="/toko/register">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan  Nama Anda" value="{{old('name')}}"> @error('name')
                    <div class="invalid-feedback ml-3">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email Anda" value="{{old('email')}}"> @error('email')
                    <div class="invalid-feedback ml-3">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="province_origin" id="province" class="form-control @error('province_origin') is-invalid @enderror">
                        <option value="" holder>Pilih Provinsi</option>
                        @foreach($provinces as $province)
                        <option value="{{$province->id}}">{{$province->province}}</option>
                        @endforeach
                    </select> @error('province_origin')
                        <div class="invalid-feedback text-center">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <select name="origin" id="origin" class="form-control @error('origin') is-invalid @enderror">
                        <option value="" holder>Pilih Kota</option>
                    </select> @error('origin')
                        <div class="invalid-feedback text-center">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"> @error('password')
                        <div class="invalid-feedback ml-3">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control @error('konci1') is-invalid @enderror" id="konci1" name="konci1" placeholder="Uangin Password"> @error('konci1')
                        <div class="invalid-feedback ml-3">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="alamat" id="" rows="3" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Anda"></textarea>
                     @error('alamat')
                    <div class="invalid-feedback ml-3">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Daftarkan Toko Baru</button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{url('/toko/login')}}">Already have an account? Login!</a>
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
   <script type="text/javascript">
    $(document).ready(function () {
        $('select[name="province_origin"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/toko/city/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="origin"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="origin"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="origin"]').empty();
            }
        });
    });

</script>
@endsection
