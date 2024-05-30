<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\RegisAController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\forgotController;
use App\Http\Controllers\SetPasswordController;
use App\Http\Controllers\LoginPetugas;
use App\Http\Controllers\HomePageCustomer;
use App\Http\Controllers\MylibraryController;
use App\Http\Controllers\FavoritePageC;
use App\Http\Controllers\BookspController;
use App\Http\Controllers\HomeAController;
use App\Http\Controllers\UsernameAController;
use App\Http\Controllers\LoginAController;
use App\Http\Controllers\PetugasAController;
use App\Http\Controllers\UserAControllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeminjamanRegisterController;
use App\Http\Controllers\HomePController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RentlogpController;

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



//petugas

Route::get('home', [App\Http\Controllers\HomepController::class, 'homePage'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'dashboardpage'])->name('dashboard');


//Route Book petugas






//Route Category petugas


Route::get('login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthLoginController::class, 'login'])->name('login.post');
Route::post('logout', [AuthLoginController::class, 'logout'])->name('logout');

// Registrasi Admin
Route::get('register-admin', [RegisAController::class, 'showRegistrationForm'])->name('register.admin');
Route::post('register-admin', [RegisAController::class, 'register'])->name('register.admin.post');
Route::post('check-duplicate', [RegisAController::class, 'checkDuplicate'])->name('checkDuplicate');


// Registrasi Peminjam
Route::get('register-peminjam', [PeminjamanRegisterController::class, 'showRegistrationForm'])->name('register.peminjam');
Route::post('register-peminjam', [PeminjamanRegisterController::class, 'register'])->name('register.peminjam.post');

// Dashboard Admin
Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('admin/dashboard', [HomeAController::class, 'homeA'])->name('admin.homeA');
    Route::get('admin/petugasA', [PetugasAController::class, 'index'])->name('petugasA.index');
    Route::get('admin/petugasA/create', [PetugasAController::class, 'create'])->name('petugasA.create');
    Route::post('admin/petugasA/store', [PetugasAController::class, 'store'])->name('petugasA.store');
    Route::get('admin/petugasA/{id}/edit', [PetugasAController::class, 'edit'])->name('petugasA.edit');
    Route::put('admin/petugasA/{id}/update', [PetugasAController::class, 'update'])->name('petugasA.update');
    Route::delete('admin/petugasA/{id}/delete', [PetugasAController::class, 'destroy'])->name('petugasA.destroy');
    Route::get('admin/userA', [UserAControllers::class, 'index'])->name('userA.index');
    Route::get('admin/userA/create', [UserAControllers::class, 'create'])->name('userA.create');
    Route::post('admin/userA/store', [UserAControllers::class, 'store'])->name('userA.store');
    Route::get('admin/userA/{id}/edit', [UserAControllers::class, 'edit'])->name('userA.edit');
    Route::put('admin/userA/{id}/update', [UserAControllers::class, 'update'])->name('userA.update');
    Route::delete('admin/userA/{id}/delete', [UserAControllers::class, 'destroy'])->name('userA.destroy');

    Route::post('petugas/logout', [AuthLoginController::class, 'logout'])->name('admin.logout');
});

// Dashboard Petugas
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('petugas/rent', [RentlogpController::class, 'rentPage'])->name('rent.page');
    Route::put('petugas/bookloans/{id}/approve', [RentlogpController::class, 'approveLoan'])->name('bookloans.approve');
    Route::get('petugas/books', [App\Http\Controllers\BookspController::class, 'booksPage'])->name('books');
    Route::get('petugas/books/create', [App\Http\Controllers\BookspController::class, 'create'])->name('books.create');
    Route::post('petugas/books', [App\Http\Controllers\BookspController::class, 'store'])->name('books.store');
    Route::get('petugas/books/{id}/edit', [BookspController::class, 'edit'])->name('books-edit');
    Route::put('petugas/books/{id}', [BookspController::class, 'update'])->name('books.update');
    Route::delete('petugas/books/{book}', [BookspController::class, 'destroy'])->name('books.destroy');


    Route::get('petugas/dashboard', [HomePController::class, 'homePage'])->name('petugas.homeP');

    Route::get('petugas/category', [App\Http\Controllers\CategorypController::class, 'index'])->name('petugas.category');
    Route::get('petugas/category-add', [App\Http\Controllers\CategorypController::class, 'add'])->name('petugas.category-add');
    Route::get('petugas/category-edit/{slug}', [App\Http\Controllers\CategorypController::class, 'edit'])->name('petugas.category-edit');
    Route::put('petugas//category-edit/{slug}', [App\Http\Controllers\CategorypController::class, 'update'])->name('petugas.category-update');
    Route::delete('petugas/category/{slug}', [App\Http\Controllers\CategorypController::class, 'destroy'])->name('petugas.category-delete');
    Route::get('petugas/category-deleted', [App\Http\Controllers\CategorypController::class, 'deleted'])->name('petugas.category-deleted');
    Route::put('petugas/category-restore/{id}', [App\Http\Controllers\CategorypController::class, 'restore'])->name('petugas.category-restore');
    Route::get('petugas/category-deleted', [App\Http\Controllers\CategorypController::class, 'deleted'])->name('petugas.category-deleted');
    Route::get('petugas/categories', [App\Http\Controllers\CategorypController::class, 'index'])->name('petugas.categories.index');
    Route::get('petugas/categories/add', [App\Http\Controllers\CategorypController::class, 'add'])->name('petugas.categories.add');
    Route::post('petugas/categories', [App\Http\Controllers\CategorypController::class, 'store'])->name('petugas.categories.store');

    Route::post('petugas/logout', [AuthLoginController::class, 'logout'])->name('petugas.logout');
});

// Dashboard Peminjam
Route::middleware(['auth', 'role:peminjam'])->group(function () {
    Route::get('peminjam/rent', [PeminjamanController::class, 'index'])->name('peminjam.rent');

    Route::get('peminjam/dashboard', [HomePageCustomer::class, 'HomePageCustomer'])->name('peminjam.dashboard');
    Route::post('peminjam/bookloans', [HomePageCustomer::class, 'store'])->name('bookloans.store');
    Route::get('peminjam/YourLibrary', [MylibraryController::class, 'Mylibrary'])->name('peminjam.Mylibrary');
    Route::get('peminjam/Favorite', [FavoritePageC::class, 'FavoritePage'])->name('peminjam.FavoritePage');

    Route::post('peminjam/logout', [AuthLoginController::class, 'logout'])->name('peminjam.logout');

});


Route::post('check-duplicate', [RegisAController::class, 'checkDuplicate'])->name('checkDuplicate');


//petugs admin
// Route untuk menampilkan halaman pendaftaran admin

// Route untuk menangani proses pendaftaran admin





