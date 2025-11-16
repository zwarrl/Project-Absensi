<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenPulangController;
// Attendance resource
Route::resource('attendance', AttendanceController::class);

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('absensi', AbsensiController::class);
Route::resource('absen_pulang', AbsenPulangController::class);
Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/{nis}/edit', [SiswaController::class, 'edit']);
Route::put('/siswa/{nis}', [SiswaController::class, 'update']);
Route::delete('/siswa/{nis}', [SiswaController::class, 'destroy']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Home
Route::get('/', function () {
    return view('welcome');
});


