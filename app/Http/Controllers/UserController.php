<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'cek']);
    }

    public function index()
    {
        session()->put('ibu', 'Master');
        session()->put('anak', 'Master Users');

        $data = User::all();

        return view('users', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            //'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'akses' => 'required',
            'alamat' => 'required',
            'lahir' => 'required',
            'nik' => 'required|min:16|unique:users,nik',
            'nohp' => 'required|numeric|digits_between:10,13',
            'pekerjaan' => 'required',
        ], [
            'name.required' => 'Kolom Nama harus diisi!',
            'email.required' => 'Kolom Email harus diisi!',
            'email.email' => 'Cek kembali nama Email Anda!',
            'email.unique' => 'Nama Email sudah pernah digunakan',
            'akses.required' => 'Kolom Akses harus diisi!',
            'alamat.required' => 'Kolom Alamat harus diisi',
            'lahir.required' => 'Kolom Tanggal Lahir harus diisi',
            'nik.required' => 'Kolom NIK harus diisi',
            'nik.min' => 'Minimal 16 Karakter untuk NIK',
            'nik.unique' => 'NIK sudah terdaftar didalam sistem',
            'nohp.required' => 'Kolom No Handphone harus diisi',
            'nohp.numeric' => 'No Handphone harus dalam bentuk Angka',
            'nik.digits_between' => 'Karakter yang diperbolehkan diantara 10 dampai 13',
            'pekerjaan.required' => 'Kolom pekerjaan harus diisi',
        ]);

        //Parsing data lahir
        $lahir = \Carbon\Carbon::parse($request->lahir)->format('Y-m-d');
        $password = \Carbon\Carbon::parse($request->lahir)->format('dmY');

        //dd($request, $lahir, $password);

        $user = new User();
        $user->name = $request->name;
        $user->nik = $request->nik;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->nohp = $request->nohp;
        $user->pekerjaan = $request->pekerjaan;
        $user->lahir = $lahir;
        $user->akses = $request->akses;
        $user->password = Hash::make($password);
        $user->save();

        Session::flash('sukses', 'Data Berhasil ditambahkan!');

        return redirect('/user');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = User::find($id);
        return view('users_edit', ['data' => $data]);
    }

    public function update($id, Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            //'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'akses' => 'required',
            'nik' => 'required|min:16|unique:users,nik,' . $id,
            'nohp' => 'numeric|digits_between:10,13|unique:users,nohp,' . $id,
            'alamat' => 'required',
            'lahir' => 'required',
            'pekerjaan' => 'required',
        ], [
            'name.required' => 'Kolom Nama harus diisi!',
            'email.required' => 'Kolom Email harus diisi!',
            'email.email' => 'Cek kembali nama Email Anda!',
            'email.unique' => 'Nama Email sudah pernah digunakan',
            'akses.required' => 'Kolom Akses harus diisi!',
            'alamat.required' => 'Kolom Alamat harus diisi',
            'lahir.required' => 'Kolom Tanggal Lahir harus diisi',
            'nik.required' => 'Kolom NIK harus diisi',
            'nik.min' => 'Minimal 16 Karakter untuk NIK',
            'nik.unique' => 'NIK sudah terdaftar didalam sistem',
            'nohp.required' => 'Kolom No Handphone harus diisi',
            'nohp.numeric' => 'No Handphone harus dalam bentuk Angka',
            'nik.digits_between' => 'Karakter yang diperbolehkan diantara 10 dampai 13',
            'pekerjaan.required' => 'Kolom pekerjaan harus diisi',
        ]);

        //Parsing data lahir
        $lahir = \Carbon\Carbon::parse($request->lahir)->format('Y-m-d');

        $user = User::find($id);
        $user->name = $request->name;
        $user->nik = $request->nik;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->pekerjaan = $request->pekerjaan;
        $user->nohp = $request->nohp;
        $user->lahir = $lahir;
        $user->akses = $request->akses;
        $user->save();

        Session::flash('sukses', 'Data Berhasil diperbaharui!');

        return redirect('/user');
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $user->delete();

        Session::flash('sukses', 'User Berhasil di Non Aktifkan!');

        return redirect('/user');
    }

    public function reset($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::find($id);

        $password = \Carbon\Carbon::parse($user->lahir)->format('dmY');

        //dd($password);

        $user->password = Hash::make($password);
        $user->save();

        Session::flash('sukses', 'Password User Berhasil di Reset!');

        return redirect('/user');
    }

    public function trash()
    {
        session()->put('anak', 'Master Disable Users');
        // mengampil data user yang sudah dihapus
        $user = User::onlyTrashed()->get();

        return view('users_trash', ['data' => $user]);
    }

    public function activate($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();

        Session::flash('sukses', 'User berhasil diaktifkan!');

        return redirect('/user/trash');
    }
}
