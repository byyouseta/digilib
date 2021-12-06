<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('template/dist/img/LogoRSUP.png') }}">
    <title>PERPUSTAKAAN DIGITAL RSUP SURAKARTA</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-info">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Digi</b>Lib<br><small>RSUP Surakarta</small></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Change Password</p>

                <form action="/password/{{ Auth::user()->id }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                            name="old_password" value="{{ old('old_password') }}" required autocomplete="email"
                            autofocus placeholder="Password Lama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-unlock"></span>
                            </div>
                        </div>
                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password Baru">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="current-password"
                            placeholder="Konfirmasi Password Baru">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-check"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        {{-- <div class="col-8"> --}}
                        {{-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> --}}
                        {{-- </div> --}}
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <p class="mb-0">
                    <a href="/home" class="text-center">Kembali</a>
                </p>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

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
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            toastr.success("{{ Session::get('sukses') }}");
        </script>
        <script>
            window.location = "/home";
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
