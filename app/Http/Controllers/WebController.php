<?php

namespace App\Http\Controllers;

use App\Book;
use App\Pesan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Captcha;
use Illuminate\Support\Facades\Hash;

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
                ->paginate(5);
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
            'captcha' => ['required', 'captcha'],
        ], [
            'pengirim.required' => 'Kolom Pengirim harus diisi!',
            'email.required' => 'Kolom Email harus diisi!',
            'email.email' => 'Cek kembali nama Email Anda',
            'pesan.required' => 'Kolom Perihal harus diisi!',
            'perihal.required' => 'Kolom Perihal harus diisi',
            'capcha.required' => 'Kolom Captcha harus diisi',
        ]);

        $pesan = new Pesan();
        $pesan->pengirim = $request->pengirim;
        $pesan->pesan = $request->pesan;
        $pesan->email = $request->email;
        $pesan->perihal = $request->perihal;
        $pesan->dibaca = 0;

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

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }

    public function password($id, Request $request)
    {
        $user = User::findOrFail($id);

        /*
        * Validate all input fields
        */
        $this->validate(
            $request,
            [
                'old_password' => 'required',
                'password' => 'required|confirmed|min:8|different:old_password',
            ],
            [
                'old_password.required' => 'Password lama harus diisi!',
                'password.required' => 'Password baru harus diisi!',
                'password.confirmed' => 'Konfirmasi Password tidak sesuai dengan Password Baru!',
                'password.min' => 'Password minimal harus 8 karakter!',
                'password.different' => 'Password baru tidak boleh sama dengan password Baru!',
            ]
        );

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            Session::flash('sukses', 'Password berhasil diperbaharui');
            //$request->session()->flash('sukses', 'Password berhasil diubah');
            return redirect('/password');
        } else {
            Session::flash('error', 'Password lama tidak sama dengan didata');
            //$request->session()->flash('error', 'Password lama tidak sama dengan didata');
            return redirect('/password');
        }
    }
}
