<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\calonSiswaController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\FormulirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrantController;
use App\Http\Controllers\InformasiTabController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PaymentController;

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




Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [InformasiTabController::class, 'info']);
    Route::view('/beranda', 'halaman_depan.beranda');
    Route::view('/lokasi', 'halaman_depan.lokasi');
    Route::get('/login', [AuthController::class, 'index'])->name('auth');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/registrasi', [AuthController::class, 'create'])->name('registrasi');
    Route::post('/registrasi', [AuthController::class, 'register']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::redirect('/home', '/registrant');

    Route::group(['middleware' => ['userAccess:admin']], function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/editUser/{id}', [AdminController::class, 'edit']);
        Route::post('/editUser', [AdminController::class, 'change']);
        Route::post('/hapusAdmin/{id}', [AdminController::class, 'hapus']);
        Route::get('/tambahAdmin', [AdminController::class, 'tambah']);
        Route::post('/tambahAdmin', [AdminController::class, 'create']);

        Route::get('/datapendaftar', [DataPendaftarController::class, 'index'])->name('datapendaftar');
        Route::get('/editData/{id}', [DataPendaftarController::class, 'edit']);
        Route::get('/viewData/{id}', [DataPendaftarController::class, 'view']);
        Route::post('/editData', [DataPendaftarController::class, 'change']);
        Route::post('/hapusData/{id}', [DataPendaftarController::class, 'hapus']);
        Route::post('/markAsPending/{id}', [DataPendaftarController::class, 'markAsPending'])->name('markAsPending');
        Route::post('/markAsFailed/{id}', [DataPendaftarController::class, 'markAsFailed'])->name('markAsFailed');
        Route::get('/dataPembayaran', [DataPendaftarController::class,'dataPembayaran'])->name('dataPembayaran');
        Route::get('/viewPembayaran/{id}', [DataPendaftarController::class, 'viewPembayaran']);
        Route::post('/markAsAccepted/{id}', [DataPendaftarController::class, 'markAsAccepted'])->name('markAsAccepted');
        Route::post('/markAsRejected/{id}', [DataPendaftarController::class, 'markAsRejected'])->name('markAsRejected');

        Route::get('/dataCalon', [calonSiswaController::class,'index'])->name('datacalon');
        Route::get('/viewCalon/{id}', [calonSiswaController::class, 'view']);
        Route::get('/editCalon/{id}', [calonSiswaController::class, 'edit']);
        Route::post('/editCalon', [calonSiswaController::class, 'change']);
        Route::post('/hapusCalon/{id}', [calonSiswaController::class, 'hapus']);
        Route::post('/diterima/{id}', [calonSiswaController::class, 'markAsAccepted'])->name('diterima');
        Route::post('/ditolak/{id}', [calonSiswaController::class, 'markAsRejected'])->name('ditolak');

        Route::get('/datasiswa', [SiswaController::class, 'index'])->name('datasiswa');
        Route::get('/editSiswa/{id}', [SiswaController::class, 'edit']);
        Route::get('/viewSiswa/{id}', [SiswaController::class, 'view']);
        Route::post('/editSiswa', [SiswaController::class, 'change']);
        Route::post('/hapusSiswa/{id}', [SiswaController::class, 'hapus']);

        Route::get('/datainformasi', [InformasiTabController::class, 'index'])->name('datainformasi');
        Route::get('/tambahInfo', [InformasiTabController::class, 'create'])->name('tambahInfo');
        Route::post('tambahInfo', [InformasiTabController::class,'store'])->name('tambahInfo.store');
        Route::get('/editInfo/{id}', [InformasiTabController::class, 'edit']);
        Route::post('/editInfo', [InformasiTabController::class, 'change'])->name('updateInfo');
        Route::post('/hapusInfo/{id}', [InformasiTabController::class, 'hapus']);
    });

    Route::group(['middleware' => ['userAccess:registrant']], function () {
        Route::get('/registrant', [RegistrantController::class, 'index'])->name('registrant');
        Route::get('/editAcc/{id}',[RegistrantController::class,'edit']);
        Route::post('/editAcc',[RegistrantController::class,'change']);
        Route::get('/pembayaran/{username}', [PaymentController::class, 'index'])->name('pembayaran');
        Route::get('/viewUpload/{id}', [PaymentController::class, 'view'])->name('viewUpload');
        Route::post('/upload_bukti/{id}', [PaymentController::class, 'upload'])->name('uploadBukti');
        Route::get('/formulir/{username}', [FormulirController::class, 'index'])->name('formulir');
        Route::post('/formulir/download', [FormulirController::class, 'downloadPDF'])->name('formulir.download');
        Route::get('/upload_formulir', [FormulirController::class, 'showUploadForm'])->name('formulir.upload.form');
        Route::post('/upload_formulir', [FormulirController::class, 'upload'])->name('formulir.upload');


    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});