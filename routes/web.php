<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JenisKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TamuController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth']);

//route for guest store data
Route::get('/', [TamuController::class, 'createTamu'])->name('client_tamu');
Route::post('/tamu/store', [TamuController::class, 'storeTamu'])->name('storeTamu');
Route::get('/reservasi/{id}', [ReservasiController::class, 'createReservasi'])->name('client_reservasi');
Route::post('/reservasi/store', [ReservasiController::class, 'storeReservasi'])->name('storeReservasi');
Route::get('/reservasi/{id_reservasi}/success', [ReservasiController::class, 'successReserve'])->name('successReservasi');
Route::get('/assessment/{id_tamu}/{id_reservasi}', [AssessmentController::class, 'createAssessment'])->name('assessment');
Route::post('/assessment/store', [AssessmentController::class, 'storeAssessment'])->name('storeAssessment');

//route for guest edit data
Route::get('/tamu/edit/{id}', [TamuController::class, 'editTamu'])->name('editDataDiri');
Route::post('/tamu/update/{id}', [TamuController::class, 'updateTamu'])->name('updateDataDiri');
Route::get('/reservasi/edit/{idTamu}/{idReservasi}', [ReservasiController::class, 'editReservasi'])->name('editReservasi');
Route::post('/reservasi/update/{idTamu}/{idReservasi}', [ReservasiController::class, 'updateReservasi'])->name('updateReservasi');
Route::get('/assessment/edit/{id_tamu}/{id_reservasi}', [AssessmentController::class, 'editAssessment'])->name('editAssessment');
Route::post('/assessment/update/{idAssessment}', [AssessmentController::class, 'updateAssessment'])->name('updateAssessment');

//route for auth
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

//route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    //route for jenis kamar
    Route::group(['prefix' => 'jenis_kamar'], function () {
        Route::get('/', [JenisKamarController::class, 'jenisKamar'])->name('jenisKamar');
        Route::post('/store', [JenisKamarController::class, 'store'])->name('storeJenisKamar');
        Route::post('/update/{id}', [JenisKamarController::class, 'edit'])->name('editJenisKamar');
        Route::delete('/delete/{id}', [JenisKamarController::class, 'delete'])->name('deleteJenisKamar');
    });

    //route for kamar
    Route::group(['prefix' => 'kamar'], function () {
        Route::get('/', [KamarController::class, 'kamar'])->name('kamar');
        Route::post('/store', [KamarController::class, 'store'])->name('storeKamar');
        Route::post('/update/{id}', [KamarController::class, 'edit'])->name('editKamar');
        Route::delete('/delete/{id}', [KamarController::class, 'delete'])->name('deleteKamar');
    });

    //route for tamu
    Route::group(['prefix' => 'tamu'], function () {
        Route::get('/', [TamuController::class, 'tamu'])->name('tamu');
        Route::get('/detail/{id}', [TamuController::class, 'detail'])->name('detailTamu');
        Route::post('/edit/{id}', [TamuController::class, 'edit'])->name('editTamu');
        Route::delete('/delete/{id}', [TamuController::class, 'delete'])->name('deleteTamu');
    });

    //route for reservasi
    Route::group(['prefix' => 'reservasi'], function () {
        Route::get('/', [ReservasiController::class, 'reservasi'])->name('reservasi');
        Route::get('/detail/{id}', [ReservasiController::class, 'detail'])->name('detailReservasi');
        Route::post('/confirm/{id}', [ReservasiController::class, 'confirmReservasi'])->name('confirmReservasi');
    });
});
