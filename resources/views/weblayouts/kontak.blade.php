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
                            <div class="form-group">
                                <label for="inputName">Nama Lengkap</label>
                                <input type="text" id="inputName" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">E-Mail</label>
                                <input type="email" id="inputEmail" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">Perihal</label>
                                <input type="text" id="inputSubject" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Pesan</label>
                                <textarea id="inputMessage" class="form-control" rows="4"></textarea>
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
