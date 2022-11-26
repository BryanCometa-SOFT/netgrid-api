<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;

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

/** Auth */
Route::post('login', [AuthController::class, 'login'] );
Route::post('register', [AuthController::class, 'register'] );


/** Favoritos */
Route::get('favorite', [FavoriteController::class, 'index'] );
Route::post('favorite', [FavoriteController::class, 'store'] );

