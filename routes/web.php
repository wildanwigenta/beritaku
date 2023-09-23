<?php

use Illuminate\Support\Facades\Auth;
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

            //  ----------------   BERITA PAGE   ------------------ //

Route::get('/', function () {
    return view('welcome');
});

            //  ----------------   ADMIN PAGE   ------------------ //

Auth::routes();

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
                                // Dashboard 
    Route::get('/',[App\Http\Controllers\DashboardController::class,'index']);
                                // Kelola Berita 
    Route::get('/semua_berita',[App\Http\Controllers\BeritaController::class,'index']);
    Route::get('/tambah_berita',[App\Http\Controllers\BeritaController::class,'tambah_berita']);
    Route::post('/tambah_data_berita',[App\Http\Controllers\BeritaController::class,'tambah_data_berita']);
    Route::get('/lihat_berita/{id_berita}',[App\Http\Controllers\BeritaController::class,'lihat_berita']);
    Route::get('/ubah_berita/{id_berita}',[App\Http\Controllers\BeritaController::class,'ubah_berita']);
    Route::post('/ubah_data_berita',[App\Http\Controllers\BeritaController::class,'ubah_data_berita']);
    Route::delete('/hapus_berita/{id_berita}',[App\Http\Controllers\BeritaController::class,'hapus_berita']);

                                // Kelola Kategori
    Route::get('/kategori_berita',[App\Http\Controllers\KategoriController::class,'index']);
    Route::get('/tambah_kategori',[App\Http\Controllers\KategoriController::class,'tambah_kategori']);
    Route::post('/tambah_data_kategori',[App\Http\Controllers\KategoriController::class,'tambah_data_kategori']);
    Route::get('/ubah_kategori/{id_kategori}',[App\Http\Controllers\KategoriController::class,'ubah_kategori']);
    Route::post('/ubah_data_kategori/{id_kategori}',[App\Http\Controllers\KategoriController::class,'ubah_data_kategori']);
    Route::delete('/hapus_kategori/{id_kategori}',[App\Http\Controllers\KategoriController::class,'hapus_kategori']);
                                // Kelola Jurnalis
    Route::get('/kelola_jurnalis',[App\Http\Controllers\JurnalisController::class,'index']);
    Route::post('/confirm_status_jurnalis/{id}',[App\Http\Controllers\JurnalisController::class,'konfirmasi_jurnalis']);
    Route::post('/hapus_jurnalis/{id}',[App\Http\Controllers\JurnalisController::class,'hapus_jurnalis']);
                                // Ubah Profile
    Route::get('/profile',[App\Http\Controllers\ProfileController::class,'profile']);
    Route::get('/update_profile/{id}',[App\Http\Controllers\ProfileController::class,'update_profile']);

});

            //  ----------------   JURNALIS PAGE   ------------------ //

Route::prefix('jurnalis')->middleware(['auth','jurnalis'])->group(function(){

    Route::get('/',[App\Http\Controllers\DashboardController::class,'indexj']);
                                // Kelola Berita
    Route::get('/semua_berita',[App\Http\Controllers\BeritaController::class,'indexjurnalis']);
    Route::get('/tambah_berita',[App\Http\Controllers\BeritaController::class,'tambah_berita']);
    Route::post('/tambah_data_berita',[App\Http\Controllers\BeritaController::class,'tambah_data_berita']);
    Route::get('/lihat_berita/{id_berita}',[App\Http\Controllers\BeritaController::class,'lihat_berita']);
    Route::get('/ubah_berita/{id_berita}',[App\Http\Controllers\BeritaController::class,'ubah_berita']);
    Route::post('/ubah_data_berita',[App\Http\Controllers\BeritaController::class,'ubah_data_berita']);
    Route::delete('/hapus_berita/{id_berita}',[App\Http\Controllers\BeritaController::class,'hapus_berita']);
                                // Ubah Profile
    Route::get('/profile',[App\Http\Controllers\ProfileController::class,'profile']);
    Route::post('/update_profile/{id}',[App\Http\Controllers\ProfileController::class,'update_profile']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

