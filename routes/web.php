<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('client', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
    Route::post('client', [App\Http\Controllers\ClientController::class, 'store'])->name('client.store');

    Route::get('/table-master', function () {
        return view('pages.table-master.index');
    });

    Route::get('materi_pembekalan', [App\Http\Controllers\MateriPembekalanController::class, 'index'])->name('materi_pembekalan.index');
    Route::post('materi_pembekalan', [App\Http\Controllers\MateriPembekalanController::class, 'store'])->name('materi_pembekalan.store');
    Route::match(['put', 'patch'], 'materi_pembekalan/{id}', [App\Http\Controllers\MateriPembekalanController::class, 'update'])->name('materi_pembekalan.update');
    Route::delete('materi_pembekalan/{id}', [App\Http\Controllers\MateriPembekalanController::class, 'destroy'])->name('materi_pembekalan.destroy');

    Route::get('bank', [App\Http\Controllers\BankController::class, 'index'])->name('bank.index');
    Route::post('bank', [App\Http\Controllers\BankController::class, 'store'])->name('bank.store');
    Route::match(['put', 'patch'], 'bank/{id}', [App\Http\Controllers\BankController::class, 'update'])->name('bank.update');
    Route::delete('bank/{id}', [App\Http\Controllers\BankController::class, 'destroy'])->name('bank.destroy');

    Route::get('pic', [App\Http\Controllers\PicController::class, 'index'])->name('pic.index');
    Route::post('pic', [App\Http\Controllers\PicController::class, 'store'])->name('pic.store');
    Route::match(['put', 'patch'], 'pic/{id}', [App\Http\Controllers\PicController::class, 'update'])->name('pic.update');
    Route::delete('pic/{id}', [App\Http\Controllers\PicController::class, 'destroy'])->name('pic.destroy');

    Route::get('pengajar', [App\Http\Controllers\PengajarController::class, 'index'])->name('pengajar.index');
    Route::post('pengajar', [App\Http\Controllers\PengajarController::class, 'store'])->name('pengajar.store');
    Route::match(['put', 'patch'], 'pengajar/{id}', [App\Http\Controllers\PengajarController::class, 'update'])->name('pengajar.update');
    Route::delete('pengajar/{id}', [App\Http\Controllers\PengajarController::class, 'destroy'])->name('pengajar.destroy');

    Route::get('pembekalan', [App\Http\Controllers\PembekalanController::class, 'index'])->name('pembekalan.index');
    Route::get('/pembekalan/getPic/{id}', [App\Http\Controllers\PembekalanController::class, 'getPic'])->name('pembekalan.getPic');
    Route::get('/pembekalan/getDetail/{id}', [App\Http\Controllers\PembekalanController::class, 'getDetail'])->name('pembekalan.getDetail');
    Route::post('pembekalan', [App\Http\Controllers\PembekalanController::class, 'store'])->name('pembekalan.store');
    Route::match(['put', 'patch'], 'pembekalan/{uuid}', [App\Http\Controllers\PembekalanController::class, 'update'])->name('pembekalan.update');
    Route::get('pembekalan/detail/{uuid}', [App\Http\Controllers\PembekalanController::class, 'detail'])->name('pembekalan.detail');
    Route::post('pembekalan/invitation/{uuid}', [App\Http\Controllers\PembekalanController::class, 'mailInvitation'])->name('pembekalan.invitation');
    Route::match(['put', 'patch'], 'pembekalan/done/{uuid}', [App\Http\Controllers\PembekalanController::class, 'done'])->name('pembekalan.done');

    Route::get('surat-penawaran', [App\Http\Controllers\SuratPenawaranController::class, 'index'])->name('surat-penawaran.index');
    Route::get('surat-penawaran/show/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'show'])->name('surat-penawaran.show');
    Route::post('surat-penawaran', [App\Http\Controllers\SuratPenawaranController::class, 'store'])->name('surat-penawaran.store');
    Route::get('surat-penawaran/view/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'view'])->name('surat-penawaran.view');
    Route::get('surat-penawaran/generate-PDF/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'generatePDF'])->name('surat-penawaran.generate-PDF');
    Route::match(['put', 'patch'], 'surat-penawaran/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'update'])->name('surat-penawaran.update');
    Route::match(['put', 'patch'], 'surat-penawaran/approve/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'approve'])->name('surat-penawaran.approve');
    Route::delete('surat-penawaran/{id}', [App\Http\Controllers\SuratPenawaranController::class, 'destroy'])->name('surat-penawaran.destroy');

    Route::get('surat-penegasan', [App\Http\Controllers\SuratPenegasanController::class, 'index'])->name('surat-penegasan.index');
    Route::get('surat-penegasan/show/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'show'])->name('surat-penegasan.show');
    Route::post('surat-penegasan', [App\Http\Controllers\SuratPenegasanController::class, 'store'])->name('surat-penegasan.store');
    Route::get('surat-penegasan/view/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'view'])->name('surat-penegasan.view');
    Route::match(['put', 'patch'], 'surat-penegasan/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'update'])->name('surat-penegasan.update');
    Route::match(['put', 'patch'], 'surat-penegasan/approve/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'approve'])->name('surat-penegasan.approve');
    Route::get('surat-penegasan/generate-PDF/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'generatePDF'])->name('surat-penegasan.generate-PDF');
    Route::delete('surat-penegasan/{id}', [App\Http\Controllers\SuratPenegasanController::class, 'destroy'])->name('surat-penegasan.destroy');
    Route::post('surat-penegasan/send-email/{uuid}', [App\Http\Controllers\SuratPenegasanController::class, 'sendEmail'])->name('surat-penegasan.send-email');

    Route::post('peserta', [App\Http\Controllers\PesertaController::class, 'store'])->name('peserta.store');
    Route::get('peserta/{uuid}', [App\Http\Controllers\PembekalanController::class, 'getPeserta'])->name('peserta.getPeserta');
    Route::post('peserta/import', [App\Http\Controllers\PesertaController::class, 'import_excel'])->name('peserta.import');
    Route::match(['put', 'patch'], 'peserta/{id}', [App\Http\Controllers\PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('peserta/{id}', [App\Http\Controllers\PesertaController::class, 'destroy'])->name('peserta.destroy');

    Route::get('berita-acara', [App\Http\Controllers\BeritaAcaraController::class, 'index'])->name('berita-acara.index');
    Route::post('berita-acara', [App\Http\Controllers\BeritaAcaraController::class, 'store'])->name('berita-acara.store');
    Route::get('berita-acara/view/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'view'])->name('berita-acara.view');
    Route::match(['put', 'patch'], 'berita-acara/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'update'])->name('berita-acara.update');
    Route::match(['put', 'patch'], 'berita-acara/approve/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'approve'])->name('berita-acara.approve');
    Route::get('berita-acara/generate-PDF/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'generatePDF'])->name('berita-acara.generate-PDF');
    Route::delete('berita-acara/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'destroy'])->name('berita-acara.destroy');
    Route::post('berita-acara/send-email/{id}', [App\Http\Controllers\BeritaAcaraController::class, 'sendEmail'])->name('berita-acara.send-email');

    Route::get('bpo', [App\Http\Controllers\BpoController::class, 'index'])->name('bpo.index');
    Route::post('bpo', [App\Http\Controllers\BpoController::class, 'store'])->name('bpo.store');
    // Route::get('bpo/signature', [App\Http\Controllers\BpoController::class, 'signature'])->name('bpo.signature');
    // Route::post('bpo/signature', [App\Http\Controllers\BpoController::class, 'upload'])->name('signaturepad.upload');

    Route::get('filemanager', [App\Http\Controllers\FileManagerController::class, 'index'])->name('filemanager.index');

    Route::get('laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');

    Route::get('invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('invoice', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoice.store');
    Route::match(['put', 'patch'], 'invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'update'])->name('invoice.update');
    Route::match(['put', 'patch'], 'invoice/approve/{id}', [App\Http\Controllers\InvoiceController::class, 'approve'])->name('invoice.approve');
    Route::get('invoice/generate-PDF/{id}', [App\Http\Controllers\InvoiceController::class, 'generatePDF'])->name('invoice.generate-PDF');
    Route::delete('invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::post('invoice/send-email/{id}', [App\Http\Controllers\InvoiceController::class, 'sendEmail'])->name('invoice.send-email');
});
