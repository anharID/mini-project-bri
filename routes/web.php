<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AsistenController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PresensiController;

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

Auth::routes();

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/check_in', [DashboardController::class, 'check_in'])->name('check_in')->middleware('auth');
Route::post('/check_out/{id}', [DashboardController::class, 'check_out'])->name('check_out')->middleware('auth');

Route::get('/codes', [CodeController::class, 'index'])->name('codes')->middleware('role:admin,staf,pj');
Route::post('/generate_code', [CodeController::class, 'store'])->name('generate_code')->middleware('role:admin,staf,pj');

Route::get('/report-presensi', [PresensiController::class, 'report'])->name('report')->middleware('role:admin,staf');
Route::get('/riwayat-presensi', [PresensiController::class, 'riwayat'])->name('riwayat')->middleware('auth');

Route::get('/export_report', [ExcelController::class, 'export_report'])->name('export_report')->middleware('role:admin,staf');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/data-asisten', AsistenController::class)->middleware('role:admin,staf');
Route::resource('/data-kelas', KelasController::class)->middleware('role:admin,staf');
Route::resource('/data-materi', MateriController::class)->middleware('role:admin,staf');
