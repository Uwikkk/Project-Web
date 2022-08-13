<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\Sub_KriteriaController;
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

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/', [AdminController::class, 'index']);
Route::post('login', [AdminController::class, 'postLogin']);
Route::get('register', [AdminController::class, 'register']);
Route::post('register', [AdminController::class, 'postRegister']);
Route::get('logout', [AdminController::class, 'logout']);

Route::middleware('checkLogin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'home']);

        Route::prefix('alternatif')->group(function () {
            Route::get('/', [AlternatifController::class, 'index']);
            Route::post('create', [AlternatifController::class, 'InsertData']);
            Route::get('edit/{id}', [AlternatifController::class, 'editData']);
            Route::post('edit/{id}', [AlternatifController::class, 'UpdateData']);
            Route::get('delete/{id}', [AlternatifController::class, 'DeletetData']);
        });

        Route::prefix('pupuk')->group(function () {
            Route::get('/', [PupukController::class, 'index']);
            Route::post('create', [PupukController::class, 'InsertData']);
            Route::get('edit/{id}', [PupukController::class, 'editData']);
            Route::post('edit/{id}', [PupukController::class, 'UpdateData']);
            Route::get('delete/{id}', [PupukController::class, 'DeletetData']);
        });

        Route::prefix('penilaian')->group(function () {
            Route::get('/', [PenilaianController::class, 'index']);
            Route::get('create', [PenilaianController::class, 'tambahData']);
            Route::post('create', [PenilaianController::class, 'InsertData']);
        });
        Route::prefix('perhitungan')->group(function () {
            Route::get('/', [PerhitunganController::class, 'index']);
        });
    });
});


Route::middleware('checkLogin')->group(function () {
    Route::prefix('kades')->group(function () {
        Route::get('/', [KadesController::class, 'index']);

        Route::prefix('pupuk')->group(function () {
            Route::get('/', [PupukController::class, 'pupuk_kades']);
        });

        Route::prefix('alternatif')->group(function () {
            Route::get('/', [AlternatifController::class, 'alternatif_kades']);
        });

        Route::prefix('kriteria')->group(function () {
            Route::get('/', [KriteriaController::class, 'index']);
            Route::post('create', [KriteriaController::class, 'InsertData']);
            Route::get('edit/{id}', [KriteriaController::class, 'editData']);
            Route::post('edit/{id}', [KriteriaController::class, 'UpdateData']);
            Route::get('delete/{id}', [KriteriaController::class, 'DeletetData']);
            Route::get('detail/{id}', [Sub_KriteriaController::class, 'index']);
        });

        Route::prefix('sub_kriteria')->group(function () {
            Route::post('create', [Sub_KriteriaController::class, 'InsertData']);
            Route::get('edit/{id}', [Sub_KriteriaController::class, 'editData']);
            Route::post('edit/{id}', [Sub_KriteriaController::class, 'UpdateData']);
            Route::get('delete/{id}', [Sub_KriteriaController::class, 'DeletetData']);
        });

        Route::prefix('perhitungan')->group(function () {
            Route::get('/', [PerhitunganController::class, 'perhitungan_kades']);
        });
    });
});
