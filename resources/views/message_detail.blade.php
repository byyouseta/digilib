@extends('layouts.master')
@section('head')
    <!-- Tempusdominus|Datetime Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <section class="content">
        <div class="container-fluid">

            {{-- <form role="form" action="/user/update/{{ $data->id }}" method="post">
                {{ csrf_field() }} --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Pesan</h3>
                </div>
                <!-- /.box-header -->

                <div class="card-body">
                    <div class="row">
                        <!-- text input -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pengirim</label>
                                <input type="text" class="form-control" readonly value="{{ $data->pengirim }}">
                            </div>
                            <div class="form-group">
                                <label>Perihal</label>
                                <input type="text" class="form-control" readonly value="{{ $data->perihal }}">
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" readonly value="{{ $data->email }}">
                            </div>
                            <div class="form-group">
                                <label>Masuk</label>
                                <input type="text" class="form-control" readonly value="{{ $data->created_at }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Pesan</label>
                                <textarea class="form-control" rows="4" readonly>{{ $data->pesan }}</textarea>
                                {{-- @if ($errors->has('alamat'))
                                        <div class="text-danger">
                                            {{ $errors->first('alamat') }}
                                        </div>
                                    @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="card-footer">
                    <a href="/messages" class="btn btn-default">Kembali</a>
                    {{-- <button type="submit" class="btn btn-primary">Perbaharui</button> --}}
                    <a href="mailto:{{ $data->email }}" target="new_tab" class="btn btn-primary">Balas Pesan</a>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </section>
@endsection
@section('plugin')
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        //Date picker
        $('#tgllahir').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    </script>
@endsection
