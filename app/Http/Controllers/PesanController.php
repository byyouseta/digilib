<?php

namespace App\Http\Controllers;

use App\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'cek']);
    }

    public function index()
    {
        session()->put('ibu', 'Pesan');
        // session()->put('anak', 'Detail Pesan');
        Session::forget('anak');

        $data = Pesan::orderBy('created_at', 'desc')->get();

        return view('messages', compact('data'));
    }

    public function detail($id)
    {
        session()->put('ibu', 'Pesan');
        session()->put('anak', 'Detail Pesan');

        $id = Crypt::decrypt($id);

        $data = Pesan::find($id);
        $data->dibaca = 1;
        $data->save();

        return view('message_detail', compact('data'));
    }
}
