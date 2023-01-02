<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Middleware\isAdmin;

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

Route::get('react', function () {
    		return view('welcome'); 
	});


/* Route::get('/', [FrontendController::class, 'index']); */
Route::get('/register', [auth::class, 'signUpForm'])->name('register');
Route::post('/register', [auth::class, 'signUpStore'])->name('register.store');
Route::get('/adminlogin', [auth::class, 'signInForm'])->name('signIn');
Route::get('/adminlogin', [auth::class, 'signInForm'])->name('login');
Route::post('/adminlogin', [auth::class, 'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class, 'singOut'])->name('logOut');


Route::group(['middleware' => SuperAdminMiddleware::class], function () {
    Route::prefix('superadmin')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('superadmin.dashboard');
    });
});


Route::group(['middleware' => isAdmin::class], function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');
    });
});

Route::resource('category', CategoryController::class);
Route::resource('subcategory', SubCategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('customer', CustomerController::class);
Route::resource('manufacturer', ManufacturerController::class);