<?php

use App\Http\Controllers\api\SiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('siswas', SiswaController::class);
    Route::get('/profile', function(Request $request) {
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Berhasil mendapatkan data',
            'data' => $request->user(),
        ],200);
    });

    Route::post('/logout', [AuthController::class,'logout']);
});