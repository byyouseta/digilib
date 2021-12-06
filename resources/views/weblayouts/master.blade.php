<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('template/dist/img/LogoRSUP.png') }}">
    <title>PERPUSTAKAAN DIGITAL RSUP SURAKARTA</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        @include('weblayouts.header')
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{-- <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div> --}}
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4">Search</h2>
                    <div class="row">
                        <div class="col-md-8 mb-3 offset-md-2">
                            <form action="/cari" method="GET">
                                {{-- @csrf --}}
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg"
                                        placeholder="Ketikkan Kata Kunci" name="cari" @if (Request::get('cari'))
                                    value="{{ Request::get('cari') }}"
                                    @endif
                                    >
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @yield("content")

            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                DigiLib RSUP Surakarta
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="https://web.rsupsurakarta.co.id">SIRS RSUP Surakarta</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('template/dist/js/demo.js') }}"></script> --}}
    @hasSection('plugin')
        @yield('plugin')
    @endif
    @if (session()->has('sukses'))
        <script>
            // swal.fire({
            //     title: "{{ __('Sukses!') }}",
            //     text: "{{ Session::get('sukses') }}",
            //     icon: "success",
            // });
            // Pakai Toast
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });
            toastr.success("{{ Session::get('sukses') }}");
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            // swal.fire({
            //     title: "{{ __('Error!') }}",
            //     text: "{{ Session::get('error') }}",
            //     type: "error",
            //     icon: "warning",
            // });
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif

    @if ($errors->any())
        <script>
            // swal.fire({
            //     title: "{{ __('Error dalam pengisian form!') }}",
            //     text: "{{ implode(' ', $errors->all()) }}",
            //     type: "error",
            //     icon: "warning",
            // });
            // Pakai toastr
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            });
            toastr.error("Kesalahan dalam pengisian data. {{ implode(' ', $errors->all()) }}");
        </script>
    @endif

</body>

</html>
