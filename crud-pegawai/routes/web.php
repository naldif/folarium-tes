<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\JabatanController;
use App\Http\Controllers\Account\KontrakController;
use App\Http\Controllers\Account\PegawaiController;
use App\Http\Controllers\Account\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/jabatan', JabatanController::class);
    Route::resource('/kontrak', KontrakController::class);
    Route::resource('/pegawai', PegawaiController::class);
});
