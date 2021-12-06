@extends('weblayouts.master')
@section('content')
    {{-- Hasil Pencarian disini --}}
    <div class="row mt-3">
        <div class="col-md-10 mb-3 offset-md-1">
            <div class="list-group">
                @if (!empty($data))
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
                @endif


            </div>
        </div>


    </div>
    <div class="row justify-content-center">
        <nav aria-label="Page navigation mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    {{ $data->appends(Request::get('page'))->links() }}
                </li>
            </ul>
        </nav>
    </div>
@endsection
