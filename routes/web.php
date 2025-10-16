<?php

use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\IndexAlumniController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use App\Exports\MitraExport;
use App\Exports\AlumniExport;
use App\Exports\DosenExport;
use App\Exports\MahasiswaExport;
use App\Exports\MasyarakatExport;
use App\Exports\TendikExport;
use App\Exports\PenggunalulusanExport;


Route::get('/', function () {
    return view('admin.pages.registration.select_cluster');
});

Route::get('pilihprodi', [DashboardController::class, 'showPilihprodi']);
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('dashboardFilter', [DashboardController::class, 'index'])->name('dashboardFilter');
Route::get('login', [AuthController::class, 'loginForm'])->name('loginform');
Route::post('login', [AuthController::class, 'login'])->name('loginform');
Route::get('logout', [AuthController::class, 'logout']);

// Akses dashboard hanya untuk admin
Route::get('dashboard', [DashboardController::class, 'index']);

// Register
Route::get('register', [AuthController::class, 'selectCluster'])->name('register.select');
Route::post('register/select-cluster', [AuthController::class, 'submitCluster'])->name('register.select.submit');
// Pemilihan Kluster
Route::get('register/select-cluster', [AuthController::class, 'selectCluster'])->name('register.cluster');
Route::post('register/select-cluster', [AuthController::class, 'submitCluster'])->name('register.submit.cluster');


// Formulir registrasi untuk masing-masing kluster
Route::group(['prefix' => 'register'], function () {
    Route::get('alumni', [\App\Http\Controllers\Register\AlumniController::class, 'registerForm'])->name('register.alumni');
    Route::post('alumni', [\App\Http\Controllers\Register\AlumniController::class, 'store'])->name('register.store.alumni');
    Route::get('penggunalulusan', [\App\Http\Controllers\Register\PenggunaLulusanController::class, 'registerForm'])->name('register.penggunalulusan');
    Route::post('penggunalulusan', [\App\Http\Controllers\Register\PenggunaLulusanController::class, 'store'])->name('register.store.penggunalulusan');
    Route::get('mahasiswa', [\App\Http\Controllers\Register\MahasiswaController::class, 'registerForm'])->name('register.mahasiswa');
    Route::post('mahasiswa', [\App\Http\Controllers\Register\MahasiswaController::class, 'store'])->name('register.store.mahasiswa');
    Route::get('tendik', [\App\Http\Controllers\Register\TendikController::class, 'registerForm'])->name('register.tendik');
    Route::post('tendik', [\App\Http\Controllers\Register\TendikController::class, 'store'])->name('register.store.tendik');
    Route::get('dosen', [\App\Http\Controllers\Register\DosenController::class, 'registerForm'])->name('register.dosen');
    Route::post('dosen', [\App\Http\Controllers\Register\DosenController::class, 'store'])->name('register.store.dosen');
    Route::get('masyarakat', [\App\Http\Controllers\Register\MasyarakatController::class, 'registerForm'])->name('register.masyarakat');
    Route::post('masyarakat', [\App\Http\Controllers\Register\MasyarakatController::class, 'store'])->name('register.store.masyarakat');
    Route::get('mitra', [\App\Http\Controllers\Register\MitraController::class, 'registerForm'])->name('register.mitra');
    Route::post('mitra', [\App\Http\Controllers\Register\MitraController::class, 'store'])->name('register.store.mitra');
});



Route::get('indexalumni', [IndexAlumniController::class, 'indexalumni']);
Route::get('indexdosen', [\App\Http\Controllers\Admin\IndexDosenController::class, 'indexdosen']);
Route::get('indexmahasiswa', [\App\Http\Controllers\Admin\IndexMahasiswaController::class, 'indexmahasiswa']);
Route::get('indexmitra', [\App\Http\Controllers\Admin\IndexMitraController::class, 'indexmitra']);
Route::get('indextendik', [\App\Http\Controllers\Admin\IndexTendikController::class, 'indextendik']);
Route::get('indexmasyarakat', [\App\Http\Controllers\Admin\IndexMasyarakatController::class, 'indexmasyarakat']);
Route::get('indexpengguna', [\App\Http\Controllers\Admin\IndexPenggunaController::class, 'indexpengguna']);


Route::get('dataalumni', [\App\Http\Controllers\Admin\DataAlumniController::class, 'dataalumni']);
Route::get('datamahasiswa', [\App\Http\Controllers\Admin\DataMahasiswaController::class, 'datamahasiswa']);
Route::get('datadosen', [\App\Http\Controllers\Admin\DataDosenController::class, 'datadosen']);
Route::get('datamitra', [\App\Http\Controllers\Admin\DataMitraController::class, 'datamitra']);
Route::get('datatendik', [\App\Http\Controllers\Admin\DataTendikController::class, 'datatendik']);
Route::get('datamasyarakat', [\App\Http\Controllers\Admin\DataMasyarakatController::class, 'datamasyarakat']);
Route::get('datapengguna', [\App\Http\Controllers\Admin\DataPenggunaController::class, 'datapengguna']);



Route::get('formalumni', [\App\Http\Controllers\Admin\FormAlumniController::class, 'formalumni']);
Route::post('/submit-formalumni', [\App\Http\Controllers\Admin\FormAlumniController::class, 'store'])->name('form.storealumni');


Route::get('formdosen', [\App\Http\Controllers\Admin\FormDosenController::class, 'formdosen']);
Route::post('/submit-formdosen', [\App\Http\Controllers\Admin\FormDosenController::class, 'store'])->name('form.storedosen');

Route::get('formmahasiswa', [\App\Http\Controllers\Admin\FormMahasiswaController::class, 'formmahasiswa']);
Route::post('/submit-formmahasiswa', [\App\Http\Controllers\Admin\FormMahasiswaController::class, 'store'])->name('form.storemahasiswa');

Route::get('formmitra', [\App\Http\Controllers\Admin\FormMitraController::class, 'formmitra']);
Route::post('/submit-formmitra', [\App\Http\Controllers\Admin\FormMitraController::class, 'store'])->name('form.storemitra');

Route::get('formtendik', [\App\Http\Controllers\Admin\FormTendikController::class, 'formtendik']);
Route::post('/submit-formtendik', [\App\Http\Controllers\Admin\FormTendikController::class, 'store'])->name('form.storetendik');

Route::get('formmasyarakat', [\App\Http\Controllers\Admin\FormMasyarakatController::class, 'formmasyarakat']);
Route::post('/submit-formmasyarakat', [\App\Http\Controllers\Admin\FormMasyarakatController::class, 'store'])->name('form.storemasyarakat');

Route::get('formpenggunalulusan', [\App\Http\Controllers\Admin\FormPenggunalulusanController::class, 'formpenggunalulusan']);
Route::post('/submit-formpenggunalulusan', [\App\Http\Controllers\Admin\FormPenggunalulusanController::class, 'store'])->name('form.storepenggunalulusan');

//Forgot Password
Route::get('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

Route::get('/sleep-well', function () {
    Mail::raw('Ini adalah uji coba pengiriman email.', function ($message) {
        $message->to('suleptin@gmail.com')->subject('Test Email');
    });

    return 'Email telah dikirim.';
});


Route::get('/export-alumni', function () {
    $export = new AlumniExport();
    return $export->export();
})->name('export.alumni');

Route::get('/export-mitra', function () {
    $export = new MitraExport();
    return $export->export();
})->name('export.mitra');

Route::get('/export-tendik', function () {
    $export = new TendikExport();
    return $export->export();
})->name('export.tendik');

Route::get('/export-mahasiswa', function () {
    $export = new MahasiswaExport();
    return $export->export();
})->name('export.mahasiswa');

Route::get('/export-penggunalulusan', function () {
    $export = new PenggunalulusanExport();
    return $export->export();
})->name('export.penggunalulusan');

Route::get('/export-dosen', function () {
    $export = new DosenExport();
    return $export->export();
})->name('export.dosen');

Route::get('forgetpassword', [AuthController::class, 'forgetpasswordForm'])->name('forgetpasswordform');
Route::post('forgetpassword', [AuthController::class, 'resetPassword'])->name('forgetpasswordform');
