<?php

declare(strict_types=1);

use App\Http\Controllers\Api\UserAuthController;
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


Route::controller(UserAuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });
});


Route::middleware('auth:api')->group(function (){
    Route::get('/user', fn (Request $request) => $request->user());
});
