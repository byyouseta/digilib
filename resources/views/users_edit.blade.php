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

            <form role="form" action="/user/update/{{ $data->id }}" method="post">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="card-body">
                        <div class="row">
                            <!-- text input -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik"
                                        value="{{ $data->nik }}">
                                    @if ($errors->has('nik'))
                                        <div class="text-danger">
                                            {{ $errors->first('nik') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama User" name="name"
                                        value="{{ $data->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Email User" name="email"
                                        value="{{ $data->email }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" placeholder="Masukkan Alamat Rumah"
                                        name="alamat">{{ $data->alamat }}</textarea>
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
                                            name="lahir"
                                            value="{{ \Carbon\Carbon::parse($data->lahir)->isoFormat('D-M-Y') }}" />
                                        <div class="input-group-append" data-target="#tgllahir"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>No Handphone</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $data->nohp }}" name="nohp">
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
                                        <input type="text" class="form-control" value="{{ $data->pekerjaan }}"
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
                                        <option value="0" {{ $data->akses == '0' ? 'selected' : '' }}>User</option>
                                        <option value="1" {{ $data->akses == '1' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @if ($errors->has('akses'))
                                        <div class="text-danger">
                                            {{ $errors->first('akses') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Pembaharuan Terakhir</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $data->updated_at }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <a href="/user" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                    </div>

                </div>
            </form>

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
