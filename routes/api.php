<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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


/** Auth */
Route::post('login', [AuthController::class, 'login'] );
Route::post('register', [AuthController::class, 'register'] );

Route::middleware(['auth:sanctum'])->group(function () {
    /** Auth - User */
    Route::get('logout', [AuthController::class, 'logout'] );
    Route::get('profile', [AuthController::class, 'profile'] );
    Route::put('user', [UserController::class, 'update'] );

    /** Favoritos */
    Route::get('favorite', [FavoriteController::class, 'index'] );
    Route::post('favorite', [FavoriteController::class, 'store'] );
});



