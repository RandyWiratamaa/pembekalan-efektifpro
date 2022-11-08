<?php

use Illuminate\Support\Facades\Route;

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

Route::get('materi_pembekalan', [App\Http\Controllers\MateriPembekalanController::class, 'index'])->name('materi_pembekalan.index');
Route::post('materi_pembekalan', [App\Http\Controllers\MateriPembekalanController::class, 'store'])->name('materi_pembekalan.store');

Route::get('bank', [App\Http\Controllers\BankController::class, 'index'])->name('bank.index');
Route::post('bank', [App\Http\Controllers\BankController::class, 'store'])->name('bank.store');
Route::match(['put', 'patch'], 'bank/{id}', [App\Http\Controllers\BankController::class, 'update'])->name('bank.update');
Route::delete('bank/{id}', [App\Http\Controllers\BankController::class, 'destroy'])->name('bank.destroy');

Route::get('pic', [App\Http\Controllers\PicController::class, 'index'])->name('pic.index');
Route::post('pic', [App\Http\Controllers\PicController::class, 'store'])->name('pic.store');
Route::delete('pic/{id}', [App\Http\Controllers\PicController::class, 'destroy'])->name('pic.destroy');

Route::get('pengajar', [App\Http\Controllers\PengajarController::class, 'index'])->name('pengajar.index');
Route::post('pengajar', [App\Http\Controllers\PengajarController::class, 'store'])->name('pengajar.store');

Route::get('pembekalan', [App\Http\Controllers\PembekalanController::class, 'index'])->name('pembekalan.index');
Route::get('/pembekalan/getPic/{id}', [App\Http\Controllers\PembekalanController::class, 'getPic'])->name('pembekalan.getPic');
Route::post('pembekalan', [App\Http\Controllers\PembekalanController::class, 'store'])->name('pembekalan.store');
Route::match(['put', 'patch'], 'pembekalan/{uuid}', [App\Http\Controllers\PembekalanController::class, 'update'])->name('pembekalan.update');

Route::post('level', [App\Http\Controllers\LevelPembekalanController::class, 'store'])->name('level.index');

Route::get('surat-penawaran', [App\Http\Controllers\SuratPenawaranController::class, 'index'])->name('surat-penawaran.index');
Route::get('surat-penawaran/show/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'show'])->name('surat-penawaran.show');
Route::post('surat-penawaran', [App\Http\Controllers\SuratPenawaranController::class, 'store'])->name('surat-penawaran.store');
Route::get('surat-penawaran/view/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'view'])->name('surat-penawaran.view');
// Route::get('surat-penawaran/search', [App\Http\Controllers\SuratPenawaranController::class, 'search'])->name('surat-penawaran.search');

Route::get('surat-penegasan', [App\Http\Controllers\SuratPenegasanController::class, 'index'])->name('surat-penegasan.index');
Route::get('surat-penegasan/show/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'show'])->name('surat-penegasan.show');
Route::post('surat-penegasan', [App\Http\Controllers\SuratPenegasanController::class, 'store'])->name('surat-penegasan.store');
Route::get('surat-penegasan/view/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'view'])->name('surat-penegasan.view');

Route::post('peserta', [App\Http\Controllers\PesertaController::class, 'store'])->name('peserta.store');
Route::get('peserta/{uuid}', [App\Http\Controllers\PembekalanController::class, 'getPeserta'])->name('peserta.getPeserta');
Route::post('peserta/import', [App\Http\Controllers\PesertaController::class, 'import_excel'])->name('peserta.import');
