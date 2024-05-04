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
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){
  Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
  Route::get('/nameSearch', [Homecontroller::class,'nameSearch'])->name('nameSearch');

  Route::get('/', [Homecontroller::class,'index'])->name('index');
  Route::get('/user', [Homecontroller::class,'admin'])->name('dashboard.admin');
  Route::get('/user/nameSearch', [Homecontroller::class,'nameSearchUser']);
  Route::get('/user/classFilter', [Homecontroller::class,'classFilterUser']);

  Route::get('/create', [Homecontroller::class,'create'])->name('user.create');
  Route::post('/store', [Homecontroller::class,'store'])->name('user.store');

  Route::get('/edit/{id}', [Homecontroller::class,'edit'])->name('user.edit');
  Route::put('/update/{id}', [Homecontroller::class,'update'])->name('user.update');
  Route::delete('/delete/{id}', [Homecontroller::class,'delete'])->name('user.delete');

});

