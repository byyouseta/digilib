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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->penulis }}</td>
                                            <td>
                                                {{ $data->kategori->nama }}
                                            </td>
                                            <td>{{ $data->tahun }}</td>
                                            <td>
                                                <div class="col text-center">
                                                    <div class="btn-group">
                                                        <a href="/book/edit/{{ Crypt::encrypt($data->id) }}"
                                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                            data-placement="bottom" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <a href="/book/delete/{{ Crypt::encrypt($data->id) }}"
                                                            class="btn btn-danger btn-sm disable-account"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            title="Non Aktifkan User">
                                                            <i class="fas fa-ban"></i>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" action="/book/store" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-book-medical"></i> Tambah </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- text input -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Buku/Jurnal</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Buku" name="nama"
                                        value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori_id">
                                        <option value="" selected>Pilih Kategori</option>
                                        @foreach ($data2 as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kategori_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('kategori_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Penerbit"
                                        name="penerbit" value="{{ old('penerbit') }}">
                                    @if ($errors->has('penerbit'))
                                        <div class="text-danger">
                                            {{ $errors->first('penerbit') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Tahun Terbit</label>

                                    <input type="text" class="form-control" placeholder="Masukkan Tahun Terbit"
                                        name="tahun" value="{{ old('tahun') }}">
                                    @if ($errors->has('tahun'))
                                        <div class="text-danger">
                                            {{ $errors->first('tahun') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Penulis</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ old('penulis') }}"
                                            name="penulis" placeholder="Masukkan Penulis Buku/ Jurnal ini">
                                    </div>
                                    @if ($errors->has('penulis'))
                                        <div class="text-danger">
                                            {{ $errors->first('penulis') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Tag</label>
                                    <textarea class="form-control" rows="3"
                                        placeholder="Masukkan Tag/ Label untuk Buku/ Jurnal ini"
                                        name="tag">{{ old('tag') }}</textarea>
                                    @if ($errors->has('tag'))
                                        <div class="text-danger">
                                            {{ $errors->first('tag') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="customFile">File Upload</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="file">
                                        <label class="custom-file-label" for="customFile">Pilih/drop file disini</label>
                                        <small> File dalam bentuk pdf dengan maksimal ukuran file 5MB</small>
                                    </div>
                                    @if ($errors->has('file'))
                                        <div class="text-danger">
                                            {{ $errors->first('file') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Abstrak</label>
                                    <textarea class="form-control" rows="7"
                                        placeholder="Masukkan Abstrak untuk Buku/ Jurnal ini"
                                        name="abstrak">{{ old('abstrak') }}</textarea>
                                    @if ($errors->has('abstrak'))
                                        <div class="text-danger">
                                            {{ $errors->first('abstrak') }}
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
    <!-- bs-custom-file-input -->
    <script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
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
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

@endsection
