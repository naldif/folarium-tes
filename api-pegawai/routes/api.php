<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KontrakController;
use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Api Register
 */
Route::post('/register', [RegisterController::class, 'register']);
/**
 * APi Pegawai
 */
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/{status_kontrak}', [PegawaiController::class, 'show']);
/**
 * APi Kontrak
 */
Route::get('/kontrak', [KontrakController::class, 'index']);

