<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenPulangController;
// Attendance resource
Route::resource('attendance', AttendanceController::class);

Route::middleware('web')->group(function () {

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('absensi', AbsensiController::class);
Route::resource('absen_pulang', AbsenPulangController::class);
Route::resource('students', StudentController::class);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/{nis}/edit', [SiswaController::class, 'edit']);
Route::put('/siswa/{nis}', [SiswaController::class, 'update']);
Route::delete('/siswa/{nis}', [SiswaController::class, 'destroy']);

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->middleware(['auth'])
         ->name('dashboard');

// Home
Route::get('/', function () {
    return view('welcome');
});
});