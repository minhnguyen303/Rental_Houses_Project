<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::view('/success', 'layouts.success_page')->name('page.success');

Route::get('/login', [AuthController::class, 'pageLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'pageRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
