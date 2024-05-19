<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
  Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
  Route::get('/dashboard/search', [Homecontroller::class,'search'])->name('search');
  // Route::get('/halaman/classFilter', [Homecontroller::class,'classFilter']);

  Route::get('/create', [Homecontroller::class,'create'])->name('create');
  Route::post('/store', [Homecontroller::class,'store'])->name('store');

  Route::get('/edit/{id}', [Homecontroller::class,'edit'])->name('edit');
  Route::put('/update/{id}', [Homecontroller::class,'update'])->name('update');
  Route::delete('/delete/{id}', [Homecontroller::class,'delete'])->name('delete');

  Route::get('/form', [HomeController::class, 'form'])->name('form');
  Route::post('/form-save', [HomeController::class, 'formProcess'])->name('form-save');

});

