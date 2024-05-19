<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\forgotController;
use App\Http\Controllers\SetPasswordController;
use App\Http\Controllers\LoginPetugas;
use App\Http\Controllers\HomePageCustomer;
use App\Http\Controllers\MylibraryController;
use App\Http\Controllers\FavoritePageC;


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

/*  Login Customer  */
Route::get('/logincustomer', [loginController::class, 'LoginPage']);
Route::get('/forgotpasswordcustomer', [forgotController::class, 'forgotPage']);
Route::get('/SetPasswordcustomer', [SetPasswordController::class, 'SetPasswordPage']);


/* HomePage Customer */
Route::get('/HomePageCustomer', [HomePageCustomer::class, 'HomePageCustomer']);
Route::get('/YourLibrary', [MylibraryController::class, 'Mylibrary']);
Route::get('/Favorite', [FavoritePageC::class, 'FavoritePage']);


//prtugas
Route::get('login', [App\Http\Controllers\LoginController::class,'loginPage'])->name('login');
Route::get('home', [App\Http\Controllers\HomeController::class, 'homePage'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboardpage'])->name('dashboard');

//Route Book petugas
Route::get('books', [App\Http\Controllers\booksController::class, 'booksPage'])->name('books');
Route::get('books/create', [booksController::class, 'create'])->name('books.create');
Route::post('books', [booksController::class, 'store'])->name('books.store');




Route::get('logout', [App\Http\Controllers\LogoutController::class, 'logPage'])->name('logout');
Route::get('rent', [App\Http\Controllers\RentController::class, 'rentPage'])->name('rent');

//Route Category petugas
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('category-add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category-add');
Route::get('/category-edit/{slug}', [CategoryController::class, 'edit'])->name('category-edit');
Route::post('/category-edit/{slug}', [CategoryController::class, 'update'])->name('category-update');
Route::delete('/category/{slug}', [CategoryController::class, 'destroy'])->name('category-delete');
Route::get('/category-deleted', [CategoryController::class, 'deleted'])->name('category-deleted');
Route::put('/category-restore/{id}', [CategoryController::class, 'restore'])->name('category-restore');
Route::get('/category-deleted', [CategoryController::class, 'deleted'])->name('category-deleted');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');


