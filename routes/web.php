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

Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'SKPD\HomeSKPDController@home')->name('home.skpd');

Route::prefix('arsip')->group(function (){

    Route::get('/', 'Yanjin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Yanjin\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Yanjin\Auth\AdminLoginController@logout')->name('admin.logout');

    //ARSIP
    Route::get('/home', 'Yanjin\ArsipController@showForm')->name('arsip.form');
    Route::post('/home', 'Yanjin\ArsipController@submitFormArsip')->name('arsip.submit');
    //ARSIP

    //SEKTOR
    Route::get('/sektor', 'Yanjin\SektorController@showForm')->name('sektor.form');
    Route::post('/sektor', 'Yanjin\SektorController@submitFormSektor')->name('sektor.submit');
    Route::get('/sektor/{id}/edit', 'Yanjin\SektorController@editSektor')->name('sektor.edit');
    Route::patch('/sektor/update/{id}', 'Yanjin\SektorController@updateSektor')->name('sektor.update');
    Route::delete('/delete/{id}' , 'Yanjin\SektorController@delete')->name('sektor.delete');
    //SEKTOR

    //JENIS IZIN
    Route::get('/izin', 'Yanjin\JenisIzinController@showForm')->name('izin.form');
    Route::post('/izin', 'Yanjin\JenisIzinController@submitFormIzin')->name('izin.submit');
    Route::get('/izin/{id}/edit', 'Yanjin\JenisIzinController@editIzin')->name('izin.edit');
    Route::patch('/izin/update/{id}', 'Yanjin\JenisIzinController@updateIzin')->name('izin.update');
    Route::delete('/delete_izin/{id}' , 'Yanjin\JenisIzinController@delete')->name('izin.delete');

    //PJ IZIN
    Route::get('/pj', 'Yanjin\PjIzinController@showForm')->name('pj.form');
    Route::post('/pj', 'Yanjin\PjIzinController@submitFormPj')->name('pj.submit');
    Route::get('/pj/{id}/edit', 'Yanjin\PjIzinController@editPj')->name('pj.edit');
    Route::patch('/pj/update/{id}', 'Yanjin\PjIzinController@updatePj')->name('pj.update');
    Route::delete('/delete_pj/{id}' , 'Yanjin\PjIzinController@delete')->name('pj.delete');


    //LEMARI
    Route::get('/lemari', 'Yanjin\LemariController@showForm')->name('lemari.form');
    Route::post('/lemari', 'Yanjin\LemariController@submitFormLemari')->name('lemari.submit');
    Route::get('/lemari/{id}/edit', 'Yanjin\LemariController@editLemari')->name('lemari.edit');
    Route::patch('/lemari/update/{id}', 'Yanjin\LemariController@updateLemari')->name('lemari.update');
    Route::delete('/delete_lemari/{id}' , 'Yanjin\LemariController@delete')->name('lemari.delete');

    //KabKota
    Route::get('/kabkota', 'Yanjin\KabKotaController@showForm')->name('kabkota.form');
    Route::post('/kabkota', 'Yanjin\KabKotaController@submitFormKabkota')->name('kabkota.submit');

    Route::get('/search','Yanjin\ArsipController@search')->name('search');

    Route::get('/side', 'Yanjin\ArsipController@sidebar');

    Route::get('/settings', 'Yanjin\SettingController@index')->name('show.setting');


    /*REKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP*/

    Route::get('/rekapToday', 'Yanjin\RekapController@today');
    Route::get('/rekapIzin', 'Yanjin\RekapController@izin')->name('rekap.izin');
    Route::get('/rekapSektor', 'Yanjin\RekapController@sektor')->name('rekap.sektor');
    Route::get('/rekapBulan', 'Yanjin\RekapController@bulan')->name('rekap.bulan');
    Route::get('/rekapTahun', 'Yanjin\RekapController@tahun')->name('rekap.tahun');

    Route::get('/rekapAll', 'Yanjin\RekapController@all')->name('rekap.all');
    Route::get('/rekapAll/{id}/edit', 'Yanjin\ArsipController@edit')->name('edit.all');
    Route::patch('/rekapAll/{id}', 'Yanjin\ArsipController@updateArsip')->name('update.all');
    /*REKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP*/

    Route::get('/peminjam','Yanjin\PinjamArsipController@peminjaman')->name('get.peminjam');
    Route::get('/peminjam/{id}/edit' , 'Yanjin\PinjamArsipController@edit')->name('edit.peminjam');
    Route::patch('/peminjam/{id}', 'Yanjin\PinjamArsipController@update')->name('update.peminjam');
    Route::delete('/peminjam/{id}', 'Yanjin\PinjamArsipController@destroy')->name('delete.peminjam');
    Route::get('/peminjam/{id}/print', 'Yanjin\PinjamArsipController@printTT')->name('print.tt');

});

Route::get('/find','Yanjin\PinjamArsipController@autocomplete')->name('autocomplete');
Route::get('/pinjam','Yanjin\PinjamArsipController@index')->name('get.pinjam');
Route::post('/pinjam','Yanjin\PinjamArsipController@store')->name('pinjam.submit');
Route::get('/skpd','SKPD\RekapskpdController@sektor')->name('rekap.skpd');
Route::get('/sk/download/{id}','SKPD\RekapskpdController@pdfview')->name('download.sk');
Route::get('/home/skpd', 'SKPD\HomeSKPDController@home')->name('home.skpd');
Route::get('/search','Yanjin\ArsipController@search')->name('search');
Route::view('/settingskpd','skpd\base\settingskpd')->name('settingskpd');

Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::get('reset', 'ResetPasswordController@showResetForm')->name('reset.pass');
    Route::post('reset/post', 'ResetPasswordController@reset')->name('reset.post');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/','SKPD\RekapSKPDController@sektor')->name('rekap.skpd');

    /*USER MANAGEMENT*/
    Route::resource('roles','SKPD\RoleSKPDController');
    Route::resource('users','SKPD\UserSKPDController');
    /*USER MANAGEMENT*/

});
