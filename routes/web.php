<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\IndikatorKegiatanController;
use App\Http\Controllers\IndikatorProgramController;
use App\Http\Controllers\IndikatorKinerjaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MasterKegiatanController;
use App\Http\Controllers\MasterProgramController;
use App\Http\Controllers\MasterSubController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\RealisasiController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [BerandaController::class, 'index']);
    Route::resource('/master_program', MasterProgramController::class);
    Route::resource('/beranda', BerandaController::class);
    Route::resource('/master_kegiatan', KegiatanController::class);
    Route::resource('/master_subkegiatan', MasterSubController::class);
    Route::resource('/indikator_program', IndikatorProgramController::class);
    Route::resource('/indikator_kegiatan', IndikatorKegiatanController::class);
    Route::resource('/indikator_kinerja', IndikatorKinerjaController::class);
    Route::resource('/pengaturan', PengaturanController::class);
    Route::resource('/realisasi', RealisasiController::class);
    Route::get('/get-kegiatan', [KegiatanController::class, 'getKegiatan']);
});
Route::get('logout', [LoginController::class, 'logout']);
