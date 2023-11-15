<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LockScreen;


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






// ----------------------------- home dashboard ------------------------------//
Route::get('/', [LandingController::class, 'index'])->name('landing.index');


// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);

Route::get('/loginadmin', [App\Http\Controllers\Auth\LoginAdminController::class, 'login'])->name('login_admin');
Route::post('/loginadmin', [App\Http\Controllers\Auth\LoginAdminController::class, 'authenticate']);

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- home dashboard ------------------------------//
// Route::get('/dashboard1', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard_klien', [App\Http\Controllers\KlienController::class, 'index'])->name('home_klien');
Route::get('/dashboard_admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home_admin');

Route::get('/buatsurvei', [App\Http\Controllers\KlienController::class, 'create'])->name('buat_survei');



Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/logoutadmin', [App\Http\Controllers\Auth\LoginAdminController::class, 'logout'])->name('logout_admin');



// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::get('user/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::get('view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail'])->middleware('auth');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');

Route::get('/change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])
    ->middleware('auth')
    ->name('change/password');

Route::post('/change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])
    ->name('change/password/db');

