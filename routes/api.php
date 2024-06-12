<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\RoleController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ForgotPasswordController;
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

Route::post('login', [LoginController::class, 'login']);
Route::post('forget-password-mail-send', [ForgotPasswordController::class, 'forgetPassword']);
Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('change-password', [LoginController::class, 'changePassword']);


    Route::post('role/list', [RoleController::class, 'index']);
    Route::get('roles/create', [RoleController::class, 'create']);
    Route::post('role/store', [RoleController::class, 'store']);
    Route::get('roles/{id}', [RoleController::class, 'show']);
    Route::get('roles/{id}/edit', [RoleController::class, 'edit']);
    Route::put('roles/{id}', [RoleController::class, 'update']);
    Route::delete('roles/{id}', [RoleController::class, 'destroy']);


    Route::post('user/list', [UserController::class, 'index']);
    Route::get('user/create', [UserController::class, 'create']);
    Route::post('user/store', [UserController::class, 'store']);
    Route::get('user/{id}', [UserController::class, 'show']);
    Route::get('user/{id}/details', [UserController::class, 'edit']);
    Route::post('user/{id}/update', [UserController::class, 'update']);
    Route::post('user/{id}/delete', [UserController::class, 'destroy']);
});