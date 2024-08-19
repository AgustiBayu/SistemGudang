<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('barang', BarangController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
    Route::post('/mutasi', [MutasiController::class, 'mutasiMasuk']);
    Route::get('/mutasi', [MutasiController::class, 'mutasi']);
    Route::delete('/mutasi/{id}', [MutasiController::class, 'hapusMutasi']);
});
