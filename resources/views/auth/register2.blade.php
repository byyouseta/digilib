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
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
    <!-- Tempusdominus|Datetime Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="container mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-outline card-secondary">
                    <div class="card-header text-center">
                        <h2>{{ __('Register') }}</h2>
                        <h4>DigiLib RSUP Surakarta</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nik"
                                    class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="nik" type="text"
                                            class="form-control @error('nik') is-invalid @enderror" name="nik"
                                            value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                                        </div>
                                    </div>
                                    {{-- @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                    </div>
                                    {{-- @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Alamat E-Mail') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                        </div>
                                    </div>
                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                        </div>
                                    </div>
                                    {{-- @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lahir"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="lahir" type="text"
                                        class="form-control datetimepicker-input @error('lahir') is-invalid @enderror"
                                        name="lahir" value="{{ old('lahir') }}" data-target="#tgllahir"
                                        data-toggle="datetimepicker" id="tgllahir" data-target-input="nearest"> --}}
                                    <div class="input-group date" id="tgllahir" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control datetimepicker-input @error('lahir') is-invalid @enderror"
                                            data-target="#tgllahir" name="lahir" required data-toggle="datetimepicker"
                                            autocomplete="off" value="{{ old('lahir') }}" />
                                        <div class="input-group-append" data-target="#tgllahir"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    {{-- @error('lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>

                            </div>



                            <div class="form-group row">
                                <label for="pekerjaan"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                                <div class="col-md-6">
                                    {{-- <div class="input-group"> --}}
                                    <input id="pekerjaan" type="text"
                                        class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                                        value="{{ old('pekerjaan') }} " required>
                                    {{-- <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-walking"></i></div>
                                        </div>
                                    </div> --}}
                                    {{-- @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <textarea id="alamat" type="text"
                                            class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                            rows="3" required>{{ old('alamat') }}</textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-home"></i></div>
                                        </div>
                                    </div>
                                    {{-- @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="nohp"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="nohp" type="text"
                                            class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                                            value="{{ old('nohp') }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                        </div>
                                    </div>
                                    {{-- @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="captcha" class="col-md-4 col-form-label text-md-right">Captcha</label>
                                <div class="col-md-6 captcha">
                                    <span>{!! captcha_img('flat') !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="captcha" class="col-md-4 col-form-label text-md-right">Enter Captcha</label>
                                <div class="col-md-6">
                                    <input id="captcha" type="text"
                                        class="form-control @error('captcha') is-invalid @enderror"
                                        placeholder="Enter Captcha" name="captcha" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-user"></i> {{ __('Register') }}
                                    </button>
                                    <a href="/" type="button" class="btn btn-default">
                                        <i class="fas fa-home"></i> {{ __('Home') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Input Addon</h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                        <h4>With icons</h4>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-check"></i></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                            </div>
                        </div>

                        <h5 class="mt-4 mb-2">With checkbox and radio inputs</h5>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <input type="checkbox">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><input type="radio"></span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->

                        <h5 class="mt-4 mb-2">With buttons</h5>

                        <p>Large: <code>.input-group.input-group-lg</code></p>

                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a href="#">Action</a></li>
                                    <li class="dropdown-item"><a href="#">Another action</a></li>
                                    <li class="dropdown-item"><a href="#">Something else here</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                            <input type="text" class="form-control">
                        </div>
                        <!-- /input-group -->

                        <p>Normal</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-danger">Action</button>
                            </div>
                            <!-- /btn-group -->
                            <input type="text" class="form-control">
                        </div>
                        <!-- /input-group -->

                        <p>Small <code>.input-group.input-group-sm</code></p>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-info btn-flat">Go!</button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section> --}}
    <!-- /.content -->
    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    <script>
        //Date picker
        $('#tgllahir').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '/kontak/reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
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
