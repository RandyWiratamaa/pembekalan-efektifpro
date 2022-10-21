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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('client', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::post('client', [App\Http\Controllers\ClientController::class, 'store'])->name('client.store');

Route::get('/table-master', function () {
    return view('pages.table-master.index');
});

Route::get('bank', [App\Http\Controllers\BankController::class, 'index'])->name('bank.index');
Route::post('bank', [App\Http\Controllers\BankController::class, 'store'])->name('bank.store');

Route::get('pic', [App\Http\Controllers\PicController::class, 'index'])->name('pic.index');
Route::post('pic', [App\Http\Controllers\PicController::class, 'store'])->name('pic.store');

Route::get('pembekalan', [App\Http\Controllers\PembekalanController::class, 'index'])->name('pembekalan.index');
Route::get('/pembekalan/getPic/{id}', [App\Http\Controllers\PembekalanController::class, 'getPic'])->name('pembekalan.getPic');
Route::post('pembekalan', [App\Http\Controllers\PembekalanController::class, 'store'])->name('pembekalan.store');

Route::post('level', [App\Http\Controllers\LevelPembekalanController::class, 'store'])->name('level.index');

