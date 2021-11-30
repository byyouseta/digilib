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

            <form role="form" action="/book/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{ $data->kategori->nama }}</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="card-body">
                        <div class="row">
                            <!-- text input -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Buku/Jurnal</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Buku" name="nama"
                                        value="{{ $data->nama }}">
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
                                                {{ $data->kategori_id == $kategori->id ? 'selected' : '' }}>
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
                                        name="penerbit" value="{{ $data->penerbit }}">
                                    @if ($errors->has('penerbit'))
                                        <div class="text-danger">
                                            {{ $errors->first('penerbit') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Tahun Terbit</label>

                                    <input type="text" class="form-control" placeholder="Masukkan Tahun Terbit"
                                        name="tahun" value="{{ $data->tahun }}">
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
                                        <input type="text" class="form-control" value="{{ $data->penulis }}"
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
                                        name="tag">{{ $data->tag }}</textarea>
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
                                        <small> * File dalam bentuk pdf dengan maksimal ukuran file 5MB</small><br>
                                        @if (isset($data->file))
                                            <small> * Lihat {{ $data->kategori->nama }} <a
                                                    href="/book/view/{{ $data->file }}"
                                                    target="new_tab">disini</a></small>
                                        @endif
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
                                        name="abstrak">{{ $data->abstrak }}</textarea>
                                    @if ($errors->has('abstrak'))
                                        <div class="text-danger">
                                            {{ $errors->first('abstrak') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <a href="/book" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                    </div>

                </div>
            </form>

        </div>
    </section>
@endsection
@section('plugin')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
