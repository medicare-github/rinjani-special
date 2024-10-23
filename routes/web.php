<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProfileController;

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
    $qty=20;
    $total_amound=$price*$qty;
    $discount=1*$price;
    $depoPrice=1545200;
    $deposite = $qty * $depoPrice;
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
        Route::PUT('/change_password/{id}', [AuthController::class, 'authChange'])->name('auth.change_password');
        Route::get('/users', [AuthController::class, 'users'])->name('users');
        Route::POST('/users/add', [AuthController::class, 'store']);
        Route::get('/users/{id}/edit', [AuthController::class, 'edit']);
        Route::PUT('/users/{id}/update', [AuthController::class, 'update']);
        Route::delete('/users/{id}/delete', [AuthController::class, 'destroy'])->name('users.destroy');
        //Dashboard
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
        //Profile
        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::POST('/profile/update',[ProfileController::class,'update'])->name('profile.update');

    });
});
