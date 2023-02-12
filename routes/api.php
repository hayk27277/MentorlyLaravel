<?php

declare(strict_types=1);

use App\Http\Controllers\Api\MajorController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserFilterController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\UserRoleController;
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

Route::controller(UserAuthController::class)->group(function (): void {
    Route::post('login', 'login');
    Route::post('register', 'register');

    Route::middleware('auth:api')->group(function (): void {
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });
});

Route::middleware('auth:api')->group(function (): void {
    Route::controller(UserProfileController::class)->prefix('user')->group(function (): void {
        Route::get('', 'index');
        Route::put('', 'update');
    });

    Route::get('users/filter', UserFilterController::class);
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{user_id}', [UserController::class, 'show']);
    Route::get('majors', MajorController::class);
    Route::get('user-roles', UserRoleController::class);
});
