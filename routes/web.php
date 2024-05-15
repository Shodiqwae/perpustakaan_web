<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\forgotController;
use App\Http\Controllers\SetPasswordController;


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
Route::get('/login/forgotpassword', [forgotController::class, 'forgotPage']);
Route::get('/login/forgotpassword/SetPassword', [SetPasswordController::class, 'SetPasswordPage']);
