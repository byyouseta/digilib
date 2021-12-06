<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cek']);
    }

    public function index()
    {
        session()->put('ibu', 'Master');
        session()->put('anak', 'Kategori Books');

        $data = Kategori::all();

        return view('kategori', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            // 'keterangan' => 'required',
        ], [
            'nama.required' => 'Kolom Nama harus diisi!'
        ]);

        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        Session::flash('sukses', 'Data Berhasil ditambahkan!');

        return redirect('/kategori');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = Kategori::find($id);
        return view('kategori_edit', ['data' => $data]);
    }

    public function update($id, Request $request)
    {

        $this->validate(
            $request,
            [
                'nama' => 'required',
                'keterangan' => 'required',
            ],
            [
                'nama.required' => 'Kolom Nama harus diisi!',
                'keterangan.required' => 'Kolom Keterangan harus diisi!',
            ]
        );

        $unit = Kategori::find($id);
        $unit->nama = $request->nama;
        $unit->keterangan = $request->keterangan;
        $unit->save();

        Session::flash('sukses', 'Data Berhasil diperbaharui!');

        return redirect('/kategori');
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $tahun = Kategori::find($id);
        $tahun->delete();

        Session::flash('sukses', 'Data Berhasil dihapus!');

        return redirect('/kategori');
    }
}
