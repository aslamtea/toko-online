<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('judul')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/MagnificPopup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('user')}}/css/main.css">
    @yield('header')
</head>

<body class="animsition">

  @include('user.tempat.topbar')

@yield('halaman')


  @include('user.tempat.footer')



  <script src="{{asset('user')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{asset('user')}}/vendor/animsition/js/animsition.min.js"></script>
  <script src="{{asset('user')}}/vendor/bootstrap/js/popper.js"></script>
  <script src="{{asset('user')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('user')}}/vendor/daterangepicker/moment.min.js"></script>
  <script src="{{asset('user')}}/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="{{asset('user')}}/vendor/slick/slick.min.js"></script>
  <script src="{{asset('user')}}/js/slick-custom.js"></script>
  <script src="{{asset('user')}}/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('user')}}/js/main.js"></script>
  @yield('footer')
  @include('sweetalert::alert')
  <script src="{{asset('vendor')}}/sweetalert/sweetalert.all.js"></script>
    <script>

        $('.tombol-keluar').on('click',function(e){

            const href = $(this).attr('href');

            e.preventDefault();

            Swal.fire({
                title: 'apakah anda yakin mau Keluar',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: ' ya, saya Akan Keluar!'
                }).then((result) => {
                if (result.value) {
                  document.location.href = href;
                }
            })

        });

      </script>

</body>

</html>
