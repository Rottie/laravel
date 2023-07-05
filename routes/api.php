<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');


Route::get('/user', [UserController::class, 'getUserInfo'])->middleware('auth:api');

Route::put('/user', [UserController::class, 'updateUserInfo'])->middleware('auth:api');
