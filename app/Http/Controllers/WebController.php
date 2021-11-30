<?php

namespace App\Http\Controllers;

use App\Book;
use App\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    //
    public function index()
    {
        $data = DB::table('books')
            ->latest()
            ->limit(5)
            ->get();

        $data2 = Book::orderBy('dilihat', 'asc')
            ->limit(5)
            ->get();

        // dd($data2);

        return view('weblayouts.main', compact('data', 'data2'));
    }

    public function pesan(Request $request)
    {
        $this->validate($request, [
            'pengirim' => 'required',
            //'username' => 'required|unique:users,username',
            'email' => 'required|email',
            'pesan' => 'required',
            'perihal' => 'required',

        ]);

        $pesan = new Pesan();
        $pesan->pengirim = $request->pengirim;
        $pesan->pesan = $request->pesan;
        $pesan->email = $request->email;
        $pesan->perihal = $request->perihal;

        $pesan->save();

        Session::flash('sukses', 'Data Berhasil dikirim!');

        return redirect('/kontak');
    }
}
