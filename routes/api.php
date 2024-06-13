<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\RoleController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ForgotPasswordController;
use App\Http\Controllers\api\ModelMasterController;
use App\Http\Controllers\api\AssemblyMasterController;
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

Route::middleware(['custom.auth'])->group(function () {
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
    Route::post('user/store', [UserController::class, 'store']);
    Route::get('user/{id}/details', [UserController::class, 'edit']);
    Route::post('user/{id}/update', [UserController::class, 'update']);
    Route::post('user/{id}/delete', [UserController::class, 'destroy']);


    Route::post('model_master/list', [ModelMasterController::class, 'index']);
    Route::post('model_master/store', [ModelMasterController::class, 'store']);
    Route::get('model_master/{id}/details', [ModelMasterController::class, 'edit']);
    Route::post('model_master/{id}/update', [ModelMasterController::class, 'update']);
    Route::post('model_master/{id}/delete', [ModelMasterController::class, 'destroy']);


    Route::post('assembly_master/list', [AssemblyMasterController::class, 'index']);
    Route::post('assembly_master/store', [AssemblyMasterController::class, 'store']);
    Route::get('assembly_master/{id}/details', [AssemblyMasterController::class, 'edit']);
    Route::post('assembly_master/{id}/update', [AssemblyMasterController::class, 'update']);
    Route::post('assembly_master/{id}/delete', [AssemblyMasterController::class, 'destroy']);
});