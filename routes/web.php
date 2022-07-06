<?php

use App\Http\Controllers\AssessmentController;
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

Route::get('/', [TamuController::class, 'createTamu'])->name('tamu');
Route::post('/tamu/store', [TamuController::class, 'storeTamu'])->name('storeTamu');
Route::get('/reservasi/{id}', [ReservasiController::class, 'createReservasi'])->name('reservasi');
Route::post('/reservasi/store', [ReservasiController::class, 'storeReservasi'])->name('storeReservasi');
Route::get('/reservasi/{id_reservasi}/success', [ReservasiController::class, 'successReserve'])->name('successReservasi');
Route::get('/assessment/{id_tamu}/{id_reservasi}', [AssessmentController::class, 'createAssessment'])->name('assessment');
Route::post('/assessment/store', [AssessmentController::class, 'storeAssessment'])->name('storeAssessment');
