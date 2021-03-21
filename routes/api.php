<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/check', [AuthController::class, 'check']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/activate/{token}', [AuthController::class, 'activate']);
    Route::post('/password', [AuthController::class, 'password']);
    Route::post('/validate-password-reset', [AuthController::class, 'validatePasswordReset']);
    Route::post('/reset', [AuthController::class, 'reset']);
    Route::post('/social/token', 'SocialAuthController@getToken');

});

Route::group(['middleware' => ['jwt.auth']], function () {

    Route::get('/auth/user', [AuthController::class, 'getAuthUser']);

});
// Countries CRUD
Route::get('/countries', [CountryController::class, 'index']);
Route::get('/countries/{id}', [CountryController::class, 'show']);
Route::post('/countries', [CountryController::class, 'store']);
Route::put('/countries/{id}', [CountryController::class, 'update']);
Route::delete('/countries/{id}', [CountryController::class, 'destroy']);
