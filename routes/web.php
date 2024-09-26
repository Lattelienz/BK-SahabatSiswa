<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilKarirController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'user','middleware' => ['auth'], 'as' => 'user.'] , function(){

  Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
  Route::get('/dashboard/search', [HomeController::class, 'search'])->name('search');
  Route::get('/siswa/{id}', [HomeController::class, 'showsiswa'])->name('siswa');
  Route::get('/guru', [HomeController::class, 'showguru'])->name('guru');
  Route::get('/profil', [HomeController::class, 'profil'])->name('profil');

  Route::post('/store', [Homecontroller::class,'store'])->name('store');
  Route::get('/edit/{id}', [Homecontroller::class,'edit'])->name('edit');
  Route::put('/update/{id}', [Homecontroller::class,'update'])->name('update');
  Route::delete('/delete/{id}', [Homecontroller::class,'delete'])->name('delete');

  Route::get('/form', [HomeController::class, 'form'])->name('form');
  Route::post('/form-save', [HomeController::class, 'formProcess'])->name('form-save');

  Route::get('/profilkarir', [ProfilKarirController::class, 'profilkarir'])->name('profilkarir');
  Route::post('/profilkarirstore', [ProfilKarirController::class, 'profilkarir_store'])->name('profilkarirstore');
  Route::get('/profile/{id}', [ProfilKarirController::class, 'profilkarir_show'])->name('profilkarir.show');



  Route::get('/cetak-pdf/{id}', [HomeController::class, 'showsiswa'])->name('cetak-pdf');

  Route::get('/tesGayaBelajar', [TestController::class, 'index'])->name('tesGayaBelajar');
  Route::post('/tesGayaBelajar', [TestController::class, 'store']);

  Route::get('/hasil/{hasil}', [TestController::class, 'hasil']);
});

