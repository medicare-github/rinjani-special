<?php

use App\Models\PaketWisata;
use Illuminate\Support\Facades\Route;
use App\Models\Profile;



Route::get('/profile', function () {
    $profile = Profile::first();
    return response()->json([
        'status' => true,
        'data' => $profile
    ]);
});

Route::get('/tourPackages', function () {
    $tourPackages= PaketWisata::selectRaw('nama,slug')->get();
    return response()->json([
        'status' => true,
        'data' => $tourPackages
    ]); 
});
