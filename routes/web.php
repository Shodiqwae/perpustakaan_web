<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

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

Route::get('/login', [loginController::class, 'LoginPage']);
Route::get('login', [App\Http\Controllers\LoginController::class,'loginPage'])->name('login');
Route::get('home', [App\Http\Controllers\HomeController::class, 'homePage'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboardpage'])->name('dashboard');
Route::get('books', [App\Http\Controllers\booksController::class, 'booksPage'])->name('books');
Route::get('logout', [App\Http\Controllers\LogoutController::class, 'logPage'])->name('logout');
Route::get('rent', [App\Http\Controllers\RentController::class, 'rentPage'])->name('rent');
