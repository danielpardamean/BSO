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
Route::get('pengajuan/download/{url}', [
    'as' => 'pengajuan.download',
    'uses' => 'PengajuanController@download'
]);

Route::get('koreksi/create/{id}', [
    'as' => 'koreksi.create',
    'uses' => 'KoreksiController@create'
]);
Route::resource('koreksi', 'KoreksiController', ['except' => 'create']);
Route::get('koreksi/download/{url}', [
    'as' => 'koreksi.download',
    'uses' => 'KoreksiController@download'
]);

Route::get('profile/password', [
    'as' => 'profile.password',
    'uses' => 'ProfileController@password'
]);
Route::post('profile/password', [
    'as' => 'profile.password',
    'uses' => 'ProfileController@storePassword'
]);
Route::get('profile/picture', [
    'as' => 'profile.profile-picture',
    'uses' => 'ProfileController@profilePicture'
]);
Route::post('profile/picture', [
    'as' => 'profile.profile-picture',
    'uses' => 'ProfileController@storeProfilePicture'
]);
Route::resource('profile', 'ProfileController');