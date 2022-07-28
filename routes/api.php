<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PariwisataController;
use App\Http\Controllers\API\PengunjungController;
use App\Http\Controllers\API\TransportasiController;
use App\Http\Controllers\API\TujuanController;
use App\Http\Controllers\API\AuthController;

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
// PARIWISATA
Route::get('pariwisata', [PariwisataController::class, 'index']);
Route::get('pariwisata/{id}', [PariwisataController::class, 'show']);
Route::post('pariwisata', [PariwisataController::class, 'store']);
Route::patch('pariwisata/{id}', [PariwisataController::class, 'update']);
Route::delete('pariwisata/{id}', [PariwisataController::class, 'delete']);

// PENGUNJUNG
Route::get('pengunjung', [PengunjungController::class, 'index']);
Route::get('pengunjung/{id}', [PengunjungController::class, 'show']);
Route::post('pengunjung', [PengunjungController::class, 'store']);
Route::patch('pengunjung/{id}', [PengunjungController::class, 'update']);
Route::delete('pengunjung/{id}', [PengunjungController::class, 'delete']);

// TRANSPORTASI
Route::get('transportasi', [TransportasiController::class, 'index']);
Route::get('transportasi/{id}', [TransportasiController::class, 'show']);
Route::post('transportasi', [TransportasiController::class, 'store']);
Route::patch('transportasi/{id}', [TransportasiController::class, 'update']);
Route::delete('transportasi/{id}', [TransportasiController::class, 'delete']);

// TUJUAN
Route::get('tujuan', [TujuanController::class, 'index']);
Route::get('tujuan/{id}', [TujuanController::class, 'show']);
Route::post('tujuan', [TujuanController::class, 'store']);
Route::patch('tujuan/{id}', [TujuanController::class, 'update']);
Route::delete('tujuan/{id}', [TujuanController::class, 'delete']);

// LOGIN JSON WEB TOKEN
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [\App\Http\Controllers\API\AuthController:: class, 'login']);
    Route::post('logout', [\App\Http\Controllers\API\AuthController:: class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\API\AuthController:: class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\API\AuthController:: class, 'me']);


});