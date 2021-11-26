@extends('layouts.master')

@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Tempusdominus|Datetime Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">{{ session('anak') }}</h3> --}}
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-plus-circle"></i> Tambah</a>
                            </button>
                            <a href="/user/trash" class="btn btn-secondary btn-sm">
                                <i class="fa fa-user-slash"></i> User tidak Aktif</a>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Akses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if ($data->akses == 1)
                                                    Admin
                                                @else
                                                    User
                                                @endif
                                            </td>
                                            <td>
                                                <div class="col text-center">
                                                    <div class="btn-group">
                                                        <a href="/user/edit/{{ Crypt::encrypt($data->id) }}"
                                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                            data-placement="bottom" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="/user/reset/{{ Crypt::encrypt($data->id) }}"
                                                            class="btn btn-success btn-sm reset-password"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            title="Reset Password">
                                                            <i class="fas fa-redo"></i>
                                                        </a>
                                                        <a href="/user/delete/{{ Crypt::encrypt($data->id) }}"
                                                            class="btn btn-danger btn-sm disable-account"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            title="Non Aktifkan User">
                                                            <i class="fas fa-user-times"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="/user/store">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-user-plus"></i></h5>
                        <h5 class="modal-title"> Tambah User </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- text input -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik"
                                        value="{{ old('nik') }}">
                                    @if ($errors->has('nik'))
                                        <div class="text-danger">
                                            {{ $errors->first('nik') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap User"
                                        name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Email User" name="email"
                                        value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" placeholder="Masukkan Alamat Rumah"
                                        name="alamat">{{ old('alamat') }}</textarea>
                                    @if ($errors->has('alamat'))
                                        <div class="text-danger">
                                            {{ $errors->first('alamat') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date" id="tgllahir" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#tgllahir"
                                            name="lahir" value="{{ old('lahir') }}" />
                                        <div class="input-group-append" data-target="#tgllahir"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>No Telepon</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('nohp') }}" name="nohp">
                                    </div>
                                    @if ($errors->has('nohp'))
                                        <div class="text-danger">
                                            {{ $errors->first('nohp') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('pekerjaan') }}"
                                            name="pekerjaan">
                                    </div>
                                    @if ($errors->has('pekerjaan'))
                                        <div class="text-danger">
                                            {{ $errors->first('pekerjaan') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Hak Akses</label>
                                    <select class="form-control" name="akses">
                                        <option value="" selected>Pilih</option>
                                        <option value="0" {{ old('akses') == '0' ? 'selected' : '' }}>User</option>
                                        <option value="1" {{ old('akses') == '1' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @if ($errors->has('akses'))
                                        <div class="text-danger">
                                            {{ $errors->first('akses') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="Submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('plugin')
    {{-- <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": false,
            });
        });
        //Date picker
        $('#tgllahir').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    </script>
    <script>
        $('.disable-account').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "User akan dinonaktifkan dari sistem",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Non Aktifkan!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
        $('.reset-password').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Password akan direset sesuai tanggal lahir User",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Reset!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
    </script>
@endsection
