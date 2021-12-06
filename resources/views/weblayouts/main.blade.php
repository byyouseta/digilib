@extends('weblayouts.master')
@section('content')
    <div class="row justify-content-center mt-5">
        {{-- <div class="col-md-8 mb-3 offset-md-2"> --}}
        <div class="col-sm-3">
            <div class="card bg-success text-center">
                <a href="#">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Special title treatment</h5> --}}

                        <p class="card-text">Buku</p>

                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-primary text-center">
                <a href="#">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Special title treatment</h5> --}}
                        <p class="card-text">Jurnal</p>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </a>
            </div>
        </div>
        {{-- </div> --}}
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Most Recent</h5>
                </div>
                <div class="card-body">
                    @foreach ($data as $recent)
                        <p class="card-text">Judul : <a href="/detail/{{ $recent->nama }}"> {{ $recent->nama }}
                            </a><br>
                            Penulis : {{ $recent->penulis }} <br>
                            Rilis {{ \Carbon\Carbon::parse($recent->created_at)->format('d M Y H:i:s') }}
                        </p>
                    @endforeach

                    {{-- <p class="card-text">Buku</p> --}}
                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Most Viewed</h5>
                </div>
                <div class="card-body">
                    @foreach ($data2 as $lihat)
                        <p class="card-text">Judul : <a href="/detail/{{ $lihat->nama }}"> {{ $lihat->nama }}
                            </a><br>
                            Penulis : {{ $lihat->penulis }} <br>
                            Dilihat {{ $lihat->dilihat }}
                            @if (empty($lihat->dilihat))
                                0
                            @endif
                            kali
                        </p>
                    @endforeach

                    {{-- <p class="card-text">Buku</p> --}}

                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
