<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\PeminjamanRegisterController;
use App\Http\Controllers\HomePageCustomer;
use App\Http\Controllers\BookControllerApi;
use App\Http\Controllers\FavoritePageC;
use App\Http\Controllers\DetailBookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthLoginController::class, 'apiLogin']);
// File: routes/api.php
Route::post('register', [PeminjamanRegisterController::class, 'apiRegister']);


Route::get('books', [BookControllerApi::class, 'index']);

Route::post('storeLoan', [AuthLoginController::class, 'storeLoan']);
Route::get('user-loans/{id}', [HomePageCustomer::class, 'getUserLoans']);
Route::post('cancel-loan', [HomePageCustomer::class, 'cancelLoanApi']);
Route::post('editProfile', [AuthLoginController::class, 'updateProfileApi']);
Route::get('getUserProfile/{id}', [AuthLoginController::class, 'getUserProfile']);
Route::get('favorites/{userId}', [FavoritePageC::class, 'getFavoritesByUser']);
Route::post('add-to-favorites', [FavoritePageC::class, 'addToFavorites']);
Route::delete('remove-from-favorites/{book}', [FavoritePageC::class, 'removeFromFavorites']);
Route::get('check-favorite/{userId}/{bookId}', [FavoritePageC::class, 'checkFavorite']);
Route::get('category/{id}', [DetailBookController::class, 'showApiCategory']);









