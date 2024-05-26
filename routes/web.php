<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\forgotController;
use App\Http\Controllers\SetPasswordController;
use App\Http\Controllers\LoginPetugas;
use App\Http\Controllers\HomePageCustomer;
use App\Http\Controllers\MylibraryController;
use App\Http\Controllers\FavoritePageC;
use App\Http\Controllers\BookspController;
use App\Http\Controllers\RegisAController;
use App\Http\Controllers\HomeAController;
use App\Http\Controllers\UsernameAController;
use App\Http\Controllers\LoginAController;



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


//petugas
Route::get('loginPetugas', [App\Http\Controllers\LoginpController::class,'loginPageP'])->name('login');
Route::get('home', [App\Http\Controllers\HomepController::class, 'homePage'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboardpage'])->name('dashboard');


//Route Book petugas
Route::get('books', [App\Http\Controllers\BookspController::class, 'booksPage'])->name('books');
Route::get('books/create', [App\Http\Controllers\BookspController::class, 'create'])->name('books.create');
Route::post('books', [App\Http\Controllers\BookspController::class, 'store'])->name('books.store');
Route::get('/books/{id}/edit', [BookspController::class, 'edit'])->name('books-edit');
Route::put('/books/{id}', [BookspController::class, 'update'])->name('books.update');

Route::delete('/books/{book}', [BookspController::class, 'destroy'])->name('books.destroy');




Route::get('logout', [App\Http\Controllers\LogoutController::class, 'logPage'])->name('logout');
Route::get('rent', [App\Http\Controllers\RentController::class, 'rentPage'])->name('rent');

//Route Category petugas
Route::get('category', [App\Http\Controllers\CategorypController::class, 'index'])->name('category');
Route::get('category-add', [App\Http\Controllers\CategorypController::class, 'add'])->name('category-add');
Route::get('/category-edit/{slug}', [App\Http\Controllers\CategorypController::class, 'edit'])->name('category-edit');
Route::put('/category-edit/{slug}', [App\Http\Controllers\CategorypController::class, 'update'])->name('category-update');
Route::delete('/category/{slug}', [App\Http\Controllers\CategorypController::class, 'destroy'])->name('category-delete');
Route::get('/category-deleted', [App\Http\Controllers\CategorypController::class, 'deleted'])->name('category-deleted');
Route::put('/category-restore/{id}', [App\Http\Controllers\CategorypController::class, 'restore'])->name('category-restore');
Route::get('/category-deleted', [App\Http\Controllers\CategorypController::class, 'deleted'])->name('category-deleted');
Route::get('/categories', [App\Http\Controllers\CategorypController::class, 'index'])->name('categories.index');
Route::get('/categories/add', [App\Http\Controllers\CategorypController::class, 'add'])->name('categories.add');
Route::post('/categories', [App\Http\Controllers\CategorypController::class, 'store'])->name('categories.store');


// Route Admin
Route::get('loginA', [LoginAController::class, 'LoginA'])->name('loginA');
Route::get('homeA', [HomeAController::class, 'HomeA'])->name('homeA');
Route::get('regis', [RegisAController::class, 'RegisA'])->name('regis');
Route::get('username', [UsernameAController::class, 'UsernameA'])->name('username');

//petugs admin
Route::get('petugasA', [PetugasAController::class, 'PetugasA'])->name('petugasA');
Route::get('petugasA-add', [PetugasAController::class, 'AddP'])->name('petugasA-add');
Route::get('userA', [UserAController::class, 'UserA'])->name('userA');


