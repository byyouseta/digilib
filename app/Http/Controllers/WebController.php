<?php

namespace App\Http\Controllers;

use App\Book;
use App\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class WebController extends Controller
{
    //
    public function index()
    {
        $data = DB::table('books')
            ->latest()
            ->limit(5)
            ->get();

        $data2 = Book::orderBy('dilihat', 'desc')
            ->limit(5)
            ->get();

        // dd($data2);

        return view('weblayouts.main', compact('data', 'data2'));
    }

    public function cari(Request $request)
    {
        $cari = $request->input('cari');

        // dd($cari);

        if (!empty($cari)) {
            $query = DB::table('books')
                ->select('books.*')
                ->where('books.nama', 'like', '%' . $cari . '%')
                ->orWhere('books.penulis', 'like', '%' . $cari . '%')
                ->orWhere('books.abstrak', 'like', '%' . $cari . '%')
                ->orWhere('books.tag', 'like', '%' . $cari . '%')
                ->orderBy('books.created_at', 'asc')
                ->paginate(10);
            $query->appends(['cari' => $cari]);
            // dd($query);
            // return data ke view
            return view('weblayouts.cari', ['data' => $query]);
        } else {
            Session::flash('error', 'Silahkan masukkan kata pencarian!');

            return view('weblayouts.cari');
        }
    }

    public function detail($id)
    {
        $data = Book::where('nama', '=', $id)
            ->first();
        $dilihat = $data->dilihat + 1;
        $data->dilihat = $dilihat;
        $data->save();
        // dd($data);
        return view('weblayouts.detail', compact('data'));
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

    public function lihat($id)
    {

        //$id = Crypt::decrypt($id);
        $file = Book::where('file', '=', $id)->first();
        // Force download of the file
        $this->file_to_download   = "unggah/" . $file->kategori_id . "/" . $file->file;
        //return response()->streamDownload(function () {
        //    echo file_get_contents($this->file_to_download);
        //}, $file.'.pdf');
        return response()->file($this->file_to_download);
    }
}
