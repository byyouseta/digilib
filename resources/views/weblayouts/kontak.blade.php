@extends('weblayouts.master')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-8">
            <!-- Default box -->
            <div class="card">
                <div class="card-body row">
                    <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <h2>DigiLib <strong>RSUP Surakarta</strong></h2>
                            <p class="lead mb-5">Jl.Prof.Dr.R.Soeharso No.28 , Jajar, Laweyan, Surakarta<br>
                                Telepon: 0271-713055 / 0271-720002
                            </p>
                        </div>
                    </div>
                    <div class="col-7">
                        <form method="POST" action="/kontak/pesan">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input type="text" id="inputName" class="form-control" name="pengirim"
                                    value="{{ old('pengirim') }}" required />
                                @if ($errors->has('pengirim'))
                                    <div class="text-danger">
                                        {{ $errors->first('pengirim') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" id="inputEmail" class="form-control" name="email"
                                    value="{{ old('email') }}" required />
                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">Perihal</label>
                                <input type="text" id="inputSubject" class="form-control" name="perihal"
                                    value="{{ old('perihal') }}" required />
                                @if ($errors->has('perihal'))
                                    <div class="text-danger">
                                        {{ $errors->first('perihal') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Pesan</label>
                                <textarea id="inputMessage" class="form-control" rows="4" name="pesan"
                                    required>{{ old('pesan') }}</textarea>
                                @if ($errors->has('pesan'))
                                    <div class="text-danger">
                                        {{ $errors->first('pesan') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                {{-- <label for="captcha">Captcha</label> --}}
                                <div class="captcha">
                                    <span>{!! captcha_img('flat') !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="captcha">Ketikkan Captcha</label>

                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha"
                                    name="captcha" required>
                                @if ($errors->has('captcha'))
                                    <div class="text-danger">
                                        {{ $errors->first('captcha') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                                    Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugin')
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
@endsection
