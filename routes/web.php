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
// dashboard untuk semua tampilan
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/admin', function () {
        return view('/admin/index');
    })->middleware('auth:admin');

    Route::get('/mahasiswa', function () {
        return view('/mahasiswa/lihat_modul');
    })->middleware('auth:mahasiswa');

    Route::get('/dosen', function () {
        return view('/dosen/index');
    })->middleware('auth:dosen');

});

Route::get('/', function () {
    return view('/auth_form/login');
})->middleware('guest');

Route::group(['prefix' => 'form'], function () {
    Route::get('/register/dosen', function () {
        return view('/auth_form/dosen_register');
    });

    // Route::get('/register/mahasiswa', function () {
    //   //  return view('/auth_form/mahasiswa_register');
    // });
    Route::get('/register/mahasiswa','RegisterController@getRegisterMahasiswa')->name('daftar.mahasiswa');
   // Route::get('/auth_form/mahasiswa_register','RegisterController@postRegisterMahasiswa')->name('create.mahasiswa');
    Route::get('/auth_form/mahasiswa_register','RegisterController@RegisterMahasiswa')->name('create.mahasiswa');
});

// fungsi login dan logout
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'LoginController@masuk');
    Route::get('/logout', 'LoginController@keluar');
});

// fungsi register mahasiswa dan dosen
Route::group(['prefix' => 'register'], function () {
    //Route::post('/dosen', 'RegisterController@postRegisterDosen');
   Route::post('/mahasiswa', 'RegisterController@postRegisterMahasiswa')->name('create.postMahasiswa');
  //  Route::post('/mahasiswa', 'RegisterController@RegisterMahasiswa')->name('create.daftar.mahasiswa');
});


// route dosen
Route::group(['prefix' => 'dosen'], function () {
    //controller jadwal
    Route::get('/daftar/jadwal', 'AdminController@getJadwaldosen')->name('daftar.jadwaldosen');
    Route::get('/view/create/jadwal', 'AdminController@getViewCreateJadwaldosen')->name('create.view.jadwal');
    // controller untuk modul
    Route::get('/view/upload/modul', 'ModulController@getViewUpload')->name('create.view.modul');
    Route::get('/daftar/modul', 'ModulController@getModul')->name('daftar.modul');
    Route::get('/download/modul/{file}', 'ModulController@downloadModul')->name('download.modul.dosen');
    Route::post('/upload/modul', 'ModulController@postModul')->name('create.postModul');
    Route::get('/edit/modul/{id_modul}', 'ModulController@edit')->name('edit.modul');
    Route::post('/update/modul/{id_modul}', 'ModulController@putModul')->name('update.modul');
    Route::get('/delete/modul/{id_modul}', 'ModulController@deleteModul')->name('delete.modul');

    // controller untuk nilai
    Route::get('/view/upload/nilai', 'NilaiController@getViewUpload')->name('create.view.nilai');
    Route::get('/daftar/nilai', 'NilaiController@index')->name('daftar.nilai');
    Route::post('/upload/nilai', 'NilaiController@postNilai')->name('create.postNilai');
    Route::get('/edit/nilai/{id_nilai}', 'NilaiController@edit')->name('edit.nilai');
    Route::post('/update/nilai/{id_nilai}', 'NilaiController@putNilai')->name('update.nilai');
    Route::get('/delete/nilai/{id_nilai}', 'NilaiController@deleteNilai')->name('delete.nilai');
    // controller untuk laporan
    Route::get('/daftar/laporan', 'LaporanController@getDataFilter')->name('daftar.laporan');
    Route::get('/daftar/laporan/filter', 'LaporanController@filter')->name('filter.laporan');
    Route::get('/download/laporan/{file}', 'LaporanController@downloadLaporan')->name('get.laporan');
    // controller untuk tugas
    Route::get('/view/upload/tugas', 'TugasController@getViewUpload')->name('create.view.tugas');
    Route::get('/daftar/tugas', 'TugasController@index')->name('daftar.tugas');
    Route::post('/upload/tugas', 'TugasController@postSoal')->name('create.postTugas');
    Route::get('/edit/tugas/{id_soal}', 'TugasController@edit')->name('edit.tugas');
    Route::post('/update/tugas/{id_soal}', 'TugasController@putSoal')->name('update.tugas');
    Route::get('/delete/tugas/{id_soal}', 'TugasController@deleteSoal')->name('delete.tugas');



    // route untuk pengaturan password
    Route::get('/view/pengaturan/password', 'PengaturanPassword@getPassword')->name('create.view.pengaturanpassword');
    Route::post('/update/pengaturan/password/{id_dosen}', 'PengaturanPassword@update')->name('update.pengaturanpassword');
});

// route mahasiswa
Route::group(['prefix' => 'mahasiswa'], function () {
    // controller untuk nilai
    Route::get('/view/nilai', 'NilaiController@getNilai')->name('view.nilai');
    Route::get('/download/nilai/{file}', 'NilaiController@downloadNilai')->name('download.nilai');
    // controlller untuk modul
    Route::get('/view/modul', 'ModulController@getModulMahasiswa')->name('view.modul');
    Route::get('/download/modul/{file}', 'ModulController@downloadModul')->name('download.modul');
    // controller untuk tugas
    Route::get('/view/tugas', 'TugasController@getSoal')->name('view.tugas');
    Route::get('/download/tugas/{id_soal}', 'TugasController@downloadSoalById')->name('details.tugas');
    // controller untuk laporan
    Route::get('/view/upload/laporan', 'LaporanController@getData')->name('view.laporan');
    Route::post('/upload/laporan', 'LaporanController@postLaporan')->name('create.postLaporan');
    
});

// route admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/kelas', 'AdminController@getKelas')->name('daftar.kelas');
    Route::get('/view/create/kelas', 'AdminController@getViewCreate')->name('create.view.kelas');
    Route::get('/ruangan', 'AdminController@getRuangan')->name('daftar.ruangan');
    Route::get('/view/create/ruangan', 'AdminController@getViewCreateRuangan')->name('create.view.ruangan');

    Route::get('/jurusan', 'AdminController@getJurusan')->name('daftar.jurusan');
    Route::get('/view/create/jurusan', 'AdminController@getViewCreateJurusan')->name('create.view.jurusan');

    Route::get('/matakuliah', 'AdminController@getMatakuliah')->name('daftar.matakuliah');
    Route::get('/view/create/matakuliah', 'AdminController@getViewCreateMatakuliah')->name('create.view.matakuliah');

    Route::get('/jadwal', 'AdminController@getJadwal')->name('daftar.jadwal');
    Route::get('/view/create/jadwal', 'AdminController@getViewCreateJadwal')->name('create.view.jadwal');

    Route::get('/view/edit/kelas/{id_kelas}', 'AdminController@getViewEdit')->name('edit.view.kelas');
    Route::get('/view/edit/mahasiswa/{id_mahasiswa}', 'AdminController@getViewEditMhs')->name('edit.view.mahasiswa');
    Route::get('/view/edit/dosen/{id_dosen}', 'AdminController@getViewEditDosen')->name('edit.view.dosen');
    //edit baru
    Route::get('/view/edit/ruangan/{id_ruangan}', 'AdminController@getViewEditRuangan')->name('edit.view.ruangan');
    Route::get('/view/edit/jurusan/{id_jurusan}', 'AdminController@getViewEditJurusan')->name('edit.view.jurusan');
    Route::get('/view/edit/matakuliah/{id_matkul}', 'AdminController@getViewEditMatakuliah')->name('edit.view.matakuliah');
    Route::get('/view/edit/jadwal/{id_jadwal}', 'AdminController@getViewEditJadwal')->name('edit.view.jadwal');
    //tambah dosen
    Route::get('/daftar/dosen', 'AdminController@getDosen')->name('daftar.dosen');
    Route::get('/view/create/dosen', 'AdminController@getViewCreateDosen')->name('create.view.dosen');

    Route::get('/daftar/mahasiswa', 'AdminController@getMahasiswa')->name('daftar.mahasiswa');
    Route::get('/delete/kelas/{id_kelas}', 'AdminController@deleteKelas')->name('delete.kelas');
    //hapus
    Route::get('/delete/ruangan/{id_ruangan}', 'AdminController@deleteRuangan')->name('delete.ruangan');
    Route::get('/delete/jurusan/{id_jurusan}', 'AdminController@deleteJurusan')->name('delete.jurusan');
    Route::get('/delete/matakuliah/{id_matkul}', 'AdminController@deleteMatakuliah')->name('delete.matakuliah');
    Route::get('/delete/jadwal/{id_jadwal}', 'AdminController@deleteJadwal')->name('delete.jadwal');

    Route::get('/delete/mahasiswa/{id_kelas}', 'AdminController@deleteMahasiswa')->name('delete.mahasiswa');
    Route::get('/delete/dosen/{id_dosen}', 'AdminController@deleteDosen')->name('delete.dosen');
    //tambah
    Route::post('/create/kelas', 'AdminController@postKelas')->name('create.postKelas');
    Route::post('/create/ruangan', 'AdminController@postRuangan')->name('create.postRuangan');
    Route::post('/create/jurusan', 'AdminController@postJurusan')->name('create.postJurusan');
    Route::post('/create/matakuliah', 'AdminController@postMatakuliah')->name('create.postMatakuliah');
    Route::post('/create/jadwal', 'AdminController@postJadwal')->name('create.postJadwal');
    Route::post('/create/dosen', 'AdminController@postDosen')->name('create.postDosen');
    //edit
    Route::post('/edit/kelas/{id_kelas}', 'AdminController@putKelas')->name('edit.putKelas');
    Route::post('/edit/mahasiswa/{id_mahasiswa}', 'AdminController@putMahasiswa')->name('edit.putMahasiswa');
    Route::post('/edit/dosen/{id_dosen}', 'AdminController@putDosen')->name('edit.putDosen');
    //edit baru
    Route::post('/edit/ruangan/{id_ruangan}', 'AdminController@putRuangan')->name('edit.putRuangan');
    Route::post('/edit/jurusan/{id_jurusan}', 'AdminController@putJurusan')->name('edit.putJurusan');
    Route::post('/edit/matakuliah/{id_matkul}', 'AdminController@putMatakuliah')->name('edit.putMatakuliah');
    Route::post('/edit/jadwal/{id_jadwal}', 'AdminController@putJadwal')->name('edit.putJadwal');
});




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
