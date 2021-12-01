@extends('weblayouts.master')
@section('content')
    {{-- Hasil Pencarian disini --}}
    <div class="row mt-3">
        <div class="col-md-10 mb-3 offset-md-1">
            <div class="list-group">
                @forelse ($data as $hasil)
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col px-4">
                                <div>
                                    <div class="float-right">
                                        {{ \Carbon\Carbon::parse($hasil->created_at)->format('d M Y') }}</div>
                                    <h3>{{ $hasil->nama }}</h3>
                                    <p class="mb-0">
                                        Penulis : {{ $hasil->penulis }} <br>
                                        Abstrak : {{ Str::substr($hasil->abstrak, 0, 100) }} <a
                                            href="/detail/{{ $hasil->nama }}" target="new_tab"> Detail</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col px-4">
                                <div>
                                    <div class="text-center">Data Tidak Ditemukan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                {{-- <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo"
                                style="max-height: 160px;">
                        </div>
                        <div class="col px-4">
                            <div>
                                <div class="float-right">2021-04-20 10:14pm</div>
                                <h3>Lorem ipsum dolor sit amet</h3>
                                <p class="mb-0">consectetuer adipiscing elit. Aenean commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                    magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <iframe width="240" height="160" src="https://www.youtube.com/embed/WEkSYw3o5is?controls=0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                class="border-0" allowfullscreen></iframe>
                        </div>
                        <div class="col px-4">
                            <div>
                                <div class="float-right">2021-04-20 11:54pm</div>
                                <h3>Lorem ipsum dolor sit amet</h3>
                                <p class="mb-0">consectetuer adipiscing elit. Aenean commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                    magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
