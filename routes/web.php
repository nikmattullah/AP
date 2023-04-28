<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tahun_ajaranController;
use App\Http\Controllers\bidang_minatController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\dosenController;
use App\Http\Controllers\pengajuan_judulController;
use App\Http\Controllers\upload_fileController;
use App\Http\Controllers\bimbinganController;
use App\Http\Controllers\biodata_dosenController;
use App\Http\Controllers\nilai_sidangController;
use App\Http\Controllers\biodata_mahasiswaController;
use App\Http\Controllers\usulan_judulController;
use App\Http\Controllers\data_bimbinganController;
use App\Http\Controllers\jadwal_sidangController;
use App\Http\Controllers\usulan_perbaikanController;
use App\Http\Controllers\nilai_perbaikanController;
use App\Http\Controllers\dashboadController;
use App\Http\Controllers\dosen_pembimbingController;
use Illuminate\Support\Facades\Auth;

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
//Route get     => pegawai          => index
//Route get     => pegawai/create   => create
//Route post    => pegawai          => store
//Route get     => pegawai/{id}     => show
//Route put     => pegawai/{id}     => update
//Route delete  => pegawai/{id}     => delete
//Route get     => pegawai/{id}/edit=> edit 
Route::middleware(['auth','level:admin,mahasiswa,dosen'])->group(function(){
    
    // Route::get('/', function () {
    //     return view('koordinator/index'); 
    // });
    Route::get('/',[dashboadController::class,'index']);

});
Route::middleware(['auth','level:admin'])->group(function(){
    
    // crud koordinator jurusan //
    //Crud Tahun Ajaran
    Route::get('/Tahun Ajaran',[tahun_ajaranController::class,'index']);
    Route::post('/Tahun Ajaran/store',[tahun_ajaranController::class,'store']);
    Route::delete('/Tahun Ajaran/{id}',[tahun_ajaranController::class,'destroy']);
    Route::put('/Tahun Ajaran/{id}',[tahun_ajaranController::class,'update']);
    
    //Crud Bidang Minat
    Route::get('/Bidang Minat', [bidang_minatController::class,'index']);
    Route::post('/Bidang Minat/store',[bidang_minatController::class,'store']);
    Route::put('/Bidang Minat/{id}',[bidang_minatController::class,'update']);
    Route::delete('/Bidang Minat/{id}',[bidang_minatController::class,'destroy']);
    
    //Crud Jurusan
    Route::get('/Jurusan',[jurusanController::class,'index']);
    Route::post('/Jurusan/store',[jurusanController::class,'store']);
    Route::delete('/Jurusan/{id}',[jurusanController::class,'destroy']);
    Route::put('/Jurusan/{id}',[jurusanController::class,'update']);
    
    //Crud Login Dosen
    Route::get('/Dosen',[dosenController::class,'index']);
    Route::post('/Dosen/store',[dosenController::class,'store']);
    Route::post('/Dosen/search',[dosenController::class,'search'])->name('dosen.search');
    // Route::delete('/Dosen/{id}',[dosenController::class,'destroy']);

    //Crud Data Pembimbing
    Route::get('/Data Pembimbing',[dosen_pembimbingController::class,'index']);
    Route::put('/Data Pembimbing/{id}',[dosen_pembimbingController::class,'update']);

    //Crud Bimbingan
    Route::get('/Data Bimbingan Koordinator',[data_bimbinganController::class,'bimbingan']);
    
    //Crud Usulan Judul
    Route::get('/Usulan Judul',[usulan_judulController::class,'index']);
    Route::put('/Usulan Judul/{id}',[usulan_judulController::class,'status']);
    Route::put('/Usulan Judul/tolak/{id}',[usulan_judulController::class,'tolak']);
    Route::get('/Usulan Judul Diterima',[usulan_judulController::class,'listjudulterima']);
    Route::get('/Usulan Judul Ditolak',[usulan_judulController::class,'list_judul_tolak']);
    
    //Crud Jawal Sidang
    Route::get('/Jadwal Sidang',[jadwal_sidangController::class,'index']);
    Route::put('/Jadwal Sidang/{id}',[jadwal_sidangController::class,'update']);

    //crud nilai perbaikan
    Route::get('/Nilai Perbaikan',[nilai_perbaikanController::class,'index']);
    Route::post('/Nilai Perbaikan/store',[nilai_perbaikanController::class,'store']);
    Route::put('/Nilai Perbaikan/{id}',[nilai_perbaikanController::class,'update']);
    Route::delete('/Nilai Perbaikan/{id}',[nilai_perbaikanController::class,'destroy']);

    Route::get('/Nilai',[nilai_sidangController::class,'nilai_koordinator']);

    // and crud koordinator jurusan //
});


Route::middleware(['auth','level:dosen'])->group(function(){    
    // crud Dosen //
    //crud Data Bimbingan
    Route::get('/Data Bimbingan',[data_bimbinganController::class,'index']);
    Route::delete('/Data Bimbingan/{id}',[data_bimbinganController::class,'destroy']);
    Route::put('/Bimbingancheckbox/{id}',[data_bimbinganController::class,'update_checkbox']);
    Route::put('/Bimbinganuncheckbox/{id}',[data_bimbinganController::class,'update_uncheckbox']);
    
    //crud nilai sidang
    Route::get('/Nilai Android',[nilai_sidangController::class,'android']);
    Route::post('/Nilai Android/store',[nilai_sidangController::class,'simpanandroid']);
    Route::put('/Nilai Android/{id}',[nilai_sidangController::class,'ubahandroid']);
    Route::delete('/Nilai Android/{id}',[nilai_sidangController::class,'hapusandroid']);

    Route::get('/Nilai Website',[nilai_sidangController::class,'Website']);
    Route::post('/Nilai Website/store',[nilai_sidangController::class,'simpanWebsite']);
    Route::put('/Nilai Website/{id}',[nilai_sidangController::class,'ubahWebsite']);
    Route::delete('/Nilai Website/{id}',[nilai_sidangController::class,'hapusWebsite']);
    
    Route::get('/Nilai Jaringan',[nilai_sidangController::class,'jaringan']);
    Route::post('/Nilai Jaringan/store',[nilai_sidangController::class,'simpanjaringan']);
    Route::put('/Nilai Jaringan/{id}',[nilai_sidangController::class,'ubahjaringan']);
    Route::delete('/Nilai Jaringan/{id}',[nilai_sidangController::class,'hapusjaringan']);
    
    //crud usulan perbaikan
    Route::get('/Usulan Perbaikan',[usulan_perbaikanController::class,'index']);
    Route::post('/Usulan Perbaikan/store',[usulan_perbaikanController::class,'store']);
    Route::put('/Usulan Perbaikan/{id}',[usulan_perbaikanController::class,'update']);
    Route::delete('/Usulan Perbaikan/{id}',[usulan_perbaikanController::class,'destroy']);

    //crud biodata dosen
    Route::get('/Biodata Dosen',[biodata_dosenController::class,'index']);
    Route::get('/Biodata Dosen/create',[biodata_dosenController::class,'create']);
    Route::post('/Biodata Dosen/store',[biodata_dosenController::class,'store']);
    Route::put('/Biodata Dosen/{id}',[biodata_dosenController::class,'update']);

});

Route::middleware(['auth','level:mahasiswa'])->group(function(){

    // crud mahasiswa //
    //crud Biodata Mahasiswa
    Route::get('/Biodata Mahasiswa',[biodata_mahasiswaController::class,'index']);
    Route::get('/Biodata Mahasiswa/create',[biodata_mahasiswaController::class,'create']);
    Route::post('/Biodata Mahasiswa/store',[biodata_mahasiswaController::class,'store']);
    Route::put('/Biodata Mahasiswa/{id}',[biodata_mahasiswaController::class,'update']);
     
    //crud pengajuan judul
    Route::get('/Pengajuan Judul',[pengajuan_judulController::class,'index']);
    Route::post('/Pengajuan Judul/store',[pengajuan_judulController::class,'store']);
    Route::put('/Pengajuan Judul/{id}',[pengajuan_judulController::class,'update']);
    Route::delete('/Pengajuan Judul/{id}',[pengajuan_judulController::class,'destroy']);
    
    //crud upload file
    Route::get('/Upload File',[upload_fileController::class,'index']);
    Route::get('/Upload File/create',[upload_fileController::class,'create']);
    Route::get('/Upload File/{id}/edit',[upload_fileController::class,'edit']);
    Route::post('/Upload File/store',[upload_fileController::class,'store'])->name('store.video');
    Route::put('/Upload File/{id}',[upload_fileController::class,'update']);
    
    //crud bimbingan
    Route::get('/Bimbingan',[data_bimbinganController::class,'index_mahasiswa']);
    Route::post('/Bimbingan/store',[data_bimbinganController::class,'store']);
    Route::put('/Bimbingan/{id}',[data_bimbinganController::class,'update']);
    
    //crud nilai sidang
    Route::get('/Nilai Sidang',[nilai_sidangController::class,'nilai_sidang']);
});

// Route::get('/Reg',[RegisterController::class,'register']);
// Route::post('/Reg/create',[RegisterController::class,'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();