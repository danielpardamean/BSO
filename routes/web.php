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

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', 'Auth\LoginController@index')->name('login');

Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('bimbingan', 'BimbinganController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('pegawai', 'PegawaiController');

Route::get('pengajuan/create/{id}', [
    'as' => 'pengajuan.create',
    'uses' => 'PengajuanController@create'
]);
Route::resource('pengajuan', 'PengajuanController', ['except' => 'create']);

Route::get('koreksi/create/{id}', [
    'as' => 'koreksi.create',
    'uses' => 'KoreksiController@create'
]);
Route::resource('koreksi', 'KoreksiController', ['except' => 'create']);

// Route::get('storage/{filename}', function ($filename)
// {
//     $path = storage_path('/' . $filename);

//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// });


