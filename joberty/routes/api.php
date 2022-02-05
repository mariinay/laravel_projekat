<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CompanyAdvertisementController;
use App\Http\Controllers\CompanyController;
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
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');

Route::resource('advertisements', AdvertisementController::class)->only('index');


Route::resource('users.advertisements', UserAdvertisementController::class)->only(['index']);

Route::resource('companies.advertisements', CompanyAdvertisementController::class)->only(['index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('advertisements', AdvertisementController::class)->only(['store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
