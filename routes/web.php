<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PaketWisataController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\guest\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/invoice', function () {
    $price=3269066;
    $qty=21;
    $total_amound=$price*$qty;
    $discount=1*$price;
    $depoPrice=1545200;
    $deposite = 20 * $depoPrice;
    $amount_due = $total_amound-$discount - $deposite;
    return view('invoice',[
        'price'=>number_format($price),
        'qty'=>$qty,
        'depoPrice'=>$depoPrice,
        'total'=>number_format($total_amound),
        'discount'=>number_format($discount),
        'grand_total'=>number_format($total_amound-$discount),
        'amount_due'=>number_format($amount_due),
        'deposite' =>number_format($deposite)
    ]);
});

Route::prefix('/mstr')->group(function () {
    Route::redirect('/','/mstr/dashboard');

    Route::middleware('guest')->group(function (){
        Route::get('/auth',[AuthController::class,'auth'])->name('login');
        Route::post('/authLog',[AuthController::class,'authentication'])->name('auth.login');
    });

    Route::middleware('auth')->group(function () {
        //User Management
        Route::get('/authLogout', [AuthController::class, 'authLogout'])->name('auth.logout');
        Route::POST('/change_password', [AuthController::class, 'authChange'])->name('auth.change_password');
        Route::get('/users', [AuthController::class, 'users'])->name('users');
        Route::POST('/users/add', [AuthController::class, 'store']);
        Route::get('/users/{id}/edit', [AuthController::class, 'edit']);
        Route::PUT('/users/{id}/update', [AuthController::class, 'update']);
        Route::delete('/users/{id}/delete', [AuthController::class, 'destroy'])->name('users.destroy');
        //Dashboard
        Route::get('/dashboard', [ProfileController::class,'index'])->name('dashboard');
        //Profile
        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::POST('/profile/update',[ProfileController::class,'update'])->name('profile.update');
        //Paket Wisata
        Route::get('/paket_wisata',[PaketWisataController::class,'index'])->name('paket_wisata');
        Route::get('/paket_wisata/{slug}/show',[PaketWisataController::class,'show'])->name('showPaketWisata');
        Route::get('/paket_wisata/add', [PaketWisataController::class, 'create'])->name('paket_wisata.add');
        Route::POST('/paket_wisata/add', [PaketWisataController::class, 'store'])->name('paket_wisata.store');
        Route::delete('/paket_wisata/{id}/delete', [PaketWisataController::class, 'destroy'])->name('paket_wisata.destroy');
        //Itineraries
        Route::get('/paket_wisata/{id}/itineraries',[PaketWisataController::class, 'itineraries'])->name('itineraries');
        Route::post('/paket_wisata/{id}/itineraries/add', [PaketWisataController::class, 'itinerariesStore'])->name('itineraries.store');
        Route::delete('/itineraries/{id}/delete', [PaketWisataController::class, 'itinerariesDestroy'])->name('itineraries.destroy');
        Route::get('/itineraries/{id}/edit', [PaketWisataController::class, 'editItinerary']);    
        Route::post('/itineraries/{id}/update', [PaketWisataController::class, 'updateItinerary']);
        //Includes Exludes
        Route::get('/paket_wisata/{id}/includesOrExcludes',[PaketWisataController::class, 'includesOrExcludes'])->name('includesOrExcludes');
        Route::post('/paket_wisata/{id}/includesOrExcludes/store', [PaketWisataController::class, 'storeIncludesOrExcludes'])->name('includesOrExcludes.store');
        Route::get('/includesOrExcludes/{id}/edit', [PaketWisataController::class, 'editIncludesOrExcludes']);
        Route::PUT('/paket_wisata/includesOrExcludes/{id}/update', [PaketWisataController::class, 'updateIncludesOrExcludes']);
        Route::delete('/includesOrExcludes/{id}/delete', [PaketWisataController::class, 'includesOrExcludesDestroy'])->name('includesOrExcludes.destroy');
    });
});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/subscribe',[HomeController::class,'subscribe'])->name('subscribe');
