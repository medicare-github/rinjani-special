<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\PaketWisataController;





Route::post('login', [AuthController::class, 'sendVerificationCode']);
Route::post('verify', [AuthController::class, 'verifyCode']);


Route::middleware(['auth:sanctum', 'check.token'])->group(function () {
    Route::get('paket-wisata/', [PaketWisataController::class, 'index']);
    Route::get('paket-wisata/{slug}', [PaketWisataController::class, 'show']);
    Route::post('paket-wisata',[PaketWisataController::class, 'store']);
    Route::put('paket-wisata/{slug}',[PaketWisataController::class, 'update']);
});
