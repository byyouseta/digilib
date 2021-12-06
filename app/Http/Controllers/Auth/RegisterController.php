<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
use Captcha;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/daftar';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nik' => ['required', 'string', 'max:20'],
            'lahir' => ['required'],
            'pekerjaan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'nohp' => ['required', 'string', 'max:15'],
            'captcha' => ['required', 'captcha'],
        ], [
            'name.required' => 'Kolom Nama harus diisi!',
            'name.string' => 'Kolom Nama berbentuk huruf alfabet',
            'name.max' => 'banyaknya karakter melebihi 255 Karakter',
            'email.required' => 'Kolom Email harus diisi!',
            'email.string' => 'Kolom Email berbentuk huruf alfabet',
            'email.max' => 'Banyaknya karakter melebihi 255 Karakter',
            'email.unique' => 'Email telah terdaftar dalam sistem',
            'password.min' => 'Password minimal 8 karakter',
            'nik.max' => 'Banyaknya karakter melebihi 20 Karakter',
            'pekerjaan.string' => 'Karakter yang dibolehkan hanya alfabeth',
            'alamat.string' => 'Karakter yang dibolehkan hanya alfabeth dan number',
            'nohp.max' => 'Karakter maksimal yang dibolehkan sampai 15 digit',
        ]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd(Carbon::now());
        // $lahir = $data['lahir'];
        // $tgllahir = \Carbon\Carbon::parse($lahir->format('Y-m-d');

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nik' => $data['nik'],
            'lahir' => Carbon::parse($data['lahir']),
            'pekerjaan' => $data['pekerjaan'],
            'alamat' => $data['alamat'],
            'nohp' => $data['nohp'],
            'akses' => '0',
            'deleted_at' => Carbon::now(),
            'password' => Hash::make($data['password']),
        ]);
    }
}
