@extends('weblayouts.master')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-8">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h4>{{ $data->nama }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Penulis</th>
                                <td>:</td>
                                <td>{{ $data->penulis }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tahun</th>
                                <td>:</td>
                                <td>{{ $data->tahun }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Judul</th>
                                <td>:</td>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Penerbit</th>
                                <td>:</td>
                                <td>{{ $data->penerbit }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>:</td>
                                <td>{{ $data->kategori->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Abstrak</th>
                                <td>:</td>
                                <td>{{ $data->abstrak }}</td>
                            </tr>
                            <tr>
                                <th scope="row">File</th>
                                <td>:</td>
                                @auth
                                    <td><a href="/lihat/{{ $data->file }}" target="new_tab"> {{ $data->file }} </a></td>
                                @endauth
                                @guest
                                    <td>{{ $data->file }}</td>
                                @endguest
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
