<?php

namespace App\Http\Controllers;

use App\Book;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

use File;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        session()->put('ibu', 'Master');
        session()->put('anak', 'Master Books');

        $data = Book::all();
        $data2 = Kategori::all();

        return view('books', compact('data', 'data2'));
    }

    public function store(Request $request)
    {

        // dd($request);
        $this->validate($request, [
            'nama' => 'required|unique:books,nama',
            'kategori_id' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required|numeric',
            'penulis' => 'required',
            'tag' => 'required',
            'abstrak' => 'required',
            'file' => 'mimes:pdf|max:5140',
        ]);

        $book = new Book();
        $book->nama = $request->nama;
        $book->kategori_id = $request->kategori_id;
        $book->penerbit = $request->penerbit;
        $book->tahun = $request->tahun;
        $book->penulis = $request->penulis;
        $book->tag = $request->tag;
        $book->abstrak = $request->abstrak;
        if (isset($request->file)) {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');
            //$random = Str::random(12);
            $extension = $file->getClientOriginalExtension();
            $nama = $request->nama;
            $nama_file = $nama . '.' . $extension;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = "unggah/" . $request->kategori_id;
            //dd($tujuan_upload);
            $file->move($tujuan_upload, $nama_file);

            $book->file = $nama_file;
        }
        $book->save();

        Session::flash('sukses', 'Data Berhasil ditambahkan!');

        return redirect('/book');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = Book::find($id);
        $data2 = Kategori::all();
        return view('book_edit', [
            'data' => $data,
            'data2' => $data2
        ]);
    }

    public function update($id, Request $request)
    {

        $this->validate($request, [
            'nama' => 'required| unique:books,nama,' . $id,
            'kategori_id' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required|numeric',
            'penulis' => 'required',
            'tag' => 'required',
            'abstrak' => 'required',
            'file' => 'mimes:pdf|max:5140',
        ]);

        $book = Book::find($id);
        $book->nama = $request->nama;
        $book->kategori_id = $request->kategori_id;
        $book->penerbit = $request->penerbit;
        $book->tahun = $request->tahun;
        $book->penulis = $request->penulis;
        $book->tag = $request->tag;
        $book->abstrak = $request->abstrak;
        if (isset($request->file)) {
            // Hapus file jika sudah ada 
            if (isset($book->file)) {
                $hapus_file = $book->file;
                $folder_hapus = "unggah/" . $book->kategori_id . "/";
                // dd($hapus_file, $folder_hapus);
                File::delete($folder_hapus . $hapus_file);
            }
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');
            //$random = Str::random(12);
            $extension = $file->getClientOriginalExtension();
            $nama = $request->nama;
            $nama_file = $nama . '.' . $extension;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = "unggah/" . $request->kategori_id;
            $file->move($tujuan_upload, $nama_file);

            $book->file = $nama_file;
        }
        $book->save();

        Session::flash('sukses', 'Data Berhasil diperbaharui!');

        return redirect('/book');
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $tahun = Book::find($id);
        $tahun->delete();

        Session::flash('sukses', 'Data Berhasil dihapus!');

        return redirect('/book');
    }

    public function view($id)
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
