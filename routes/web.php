<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// autentikasi admin open
Route::get('/admin/register', 'Admin\AutentikasiController@register');
Route::post('/admin/register', 'Admin\AutentikasiController@daftar');
Route::get('/admin/login', 'Admin\AutentikasiController@login')->name('login');
Route::post('/admin/login', 'Admin\AutentikasiController@masuk');
Route::get('admin/logout', 'Admin\AutentikasiController@logout');
// autentikasi admin close

// autentikasi toko open
Route::get('/toko/register', 'Toko\AuthController@register');
Route::post('/toko/register', 'Toko\AuthController@daftar');
Route::get('/toko/login', 'Toko\AuthController@login');
Route::post('/toko/login', 'Toko\AuthController@masuk');
Route::get('toko/logout', 'Toko\AuthController@logout');
Route::get('/toko/city/{id}', 'Toko\AuthController@getCitiesAjax');
// autentikasi toko close

// autentikasi user open
Route::get('/login', 'User\AuthController@login');
Route::get('/register', 'User\AuthController@register');
Route::post('/login', 'User\AuthController@masuk');
Route::post('/register', 'User\AuthController@daftar');
Route::get('/logout', 'User\AuthController@logout');
// autentikasi user close

// autentikasi penulis open
Route::get('/penulis/login', 'Penulis\AuthController@login');
Route::get('/penulis/register', 'Penulis\AuthController@register');
Route::post('/penulis/login', 'Penulis\AuthController@masuk');
Route::post('/penulis/register', 'Penulis\AuthController@daftar');
Route::get('/penulis/logout', 'Penulis\AuthController@logout');
// autentikasi penulis close


Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
    Route::resource('profil', 'ProfilController');
    Route::resource('akses', 'AksesController');
    Route::resource('menu', 'MenuController');
    Route::resource('menu_url', 'Menu_urlController');
    Route::resource('submenu', 'SubmenuController');
    Route::resource('member', 'MemberController');
    Route::resource('pembeli', 'PembeliController');
    Route::resource('post', 'PostController');
    Route::resource('categori', 'CategoriController');
    Route::resource('p_tag', 'P_tagController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('merek', 'MerekController');
    Route::resource('barang', 'BarangController');
    Route::resource('keranjang', 'KeranjangController');
    Route::resource('keranjang_detail', 'Keranjang_detailController');
    Route::get('/kota/{id}', 'BarangController@getCitiesAjax');
});

Route::group(['prefix' => 'toko',  'namespace' => 'Toko', 'middleware' => 'toko'], function () {
    Route::get('/profil', 'ProfilController@index');
    Route::get('/keranjang', 'TokoController@keranjang');
    Route::post('/produk/upload/{id}', 'ProdukController@upload');
    Route::delete('/produk/upload/{id}', 'ProdukController@delete');
    Route::resource('produk', 'ProdukController');
});

Route::group(['prefix' => 'penulis',  'namespace' => 'Penulis', 'middleware' => 'penulis'], function () {
    Route::resource('profil', 'ProfilController');
    Route::resource('post', 'PostController');
});

Route::get('/home', 'User\HomeController@index');
Route::get('/produk/{slug}', 'User\HomeController@tampilproduk');
Route::group(['middleware' => 'bisnis', 'namespace' => 'User'], function () {
    Route::delete('/produk/{id}', 'CekoutController@delete');
    Route::post('/produk/{id}', 'HomeController@pesan');
    Route::patch('/produk/{id}', 'CekoutController@update');
    Route::get('/cek_out', 'CekoutController@index');
    Route::get('/cek_out/pesan', 'CekoutController@pesan');
    Route::post('/cek_out/pesan', 'CekoutController@simpan');
});
