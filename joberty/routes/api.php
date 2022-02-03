<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\UserAdvertisementController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
//Route::get('/users/{id}/advertisements', [UserAdvertisementController::class, 'index'])->name('users.advertisements.index');

Route::resource('advertisements', AdvertisementController::class);
Route::resource('users.advertisements', UserAdvertisementController::class)->only(['index']);

