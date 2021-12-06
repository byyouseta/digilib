<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('weblayouts.main');
// });
Route::get('/', 'WebController@index')->name('web.index');
Route::get('/cari', 'WebController@cari')->name('web.cari');
Route::get('/detail/{id}', 'WebController@detail')->name('web.detail');
Route::post('/kontak/pesan', 'WebController@pesan')->name('web.pesan');
Route::get('/lihat/{id}', 'WebController@lihat')->name('web.lihat')->middleware('auth');
Route::post('/password/{id}', 'WebController@password')->name('web.password')->middleware('auth');
Route::get('/kontak', function () {
    return view('weblayouts.kontak');
});
Route::get('/daftar', function () {
    return view('weblayouts.daftar');
});
Route::get('/password', function () {
    return view('auth.password');
})->middleware('auth');

Route::get('/kontak/reload-captcha', 'WebController@reloadCaptcha');

Auth::routes();

Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user.index');
Route::post('/user/store', 'UserController@store')->name('user.store');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
Route::get('/user/delete/{id}', 'UserController@delete')->name('user.delete');
Route::get('/user/reset/{id}', 'UserController@reset')->name('user.reset');
Route::get('/user/trash', 'UserController@trash')->name('user.trash');
Route::get('/user/activate/{id}', 'UserController@activate')->name('user.activate');

Route::get('/book', 'BookController@index')->name('book.index');
Route::post('/book/store', 'BookController@store')->name('book.store');
Route::get('/book/edit/{id}', 'BookController@edit')->name('book.edit');
Route::get('/book/view/{id}', 'BookController@view')->name('book.view');
Route::post('/book/update/{id}', 'BookController@update')->name('book.update');

Route::get('/kategori', 'KategoriController@index')->name('kategori.index');
Route::post('/kategori/store', 'KategoriController@store')->name('kategori.store');
Route::get('/kategori/edit/{id}', 'KategoriController@edit')->name('kategori.edit');
Route::post('/kategori/update/{id}', 'KategoriController@update')->name('kategori.update');
Route::get('/kategori/delete/{id}', 'KategoriController@delete')->name('kategori.delete');

Route::get('/messages', 'PesanController@index')->name('pesan.index');
Route::get('/messages/{id}', 'PesanController@detail')->name('pesan.detail');
