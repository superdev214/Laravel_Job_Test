<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, IndexController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name(
        'post.login'
    );  
    Route::get('/register', [AuthController::class, 'viewRegister'])->name(
        'register'
    );
    Route::post('/register', [AuthController::class, 'postRegister'])->name(
        'post.register'
    );
});

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/home', [IndexController::class, 'viewHome'])->name('home');
});