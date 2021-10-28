<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', [Controller::class, 'onFilterChange']);
Route::post('/', [Controller::class, 'onFilterChange']);
Route::get('/login', [CustomAuthController::class, 'login']);
Route::get('/register', [CustomAuthController::class, 'register'])->middleware('isLoggedIn');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user')->middleware('isLoggedIn');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/logout', [CustomAuthController::class, 'logoutUser']);
Route::get('/borrow', [Controller::class, 'borrowItem'])->middleware('isLoggedIn');
Route::post('/delete-user', [Controller::class, 'removeUser'])->middleware('isLoggedIn');
Route::post('/delete-keyword', [Controller::class, 'removeKeyword'])->middleware('isLoggedIn');
Route::get('/keywords', [Controller::class, 'keywords'])->middleware('isLoggedIn');
Route::post('/add-keyword', [Controller::class, 'addKeyword'])->name('add-keyword')->middleware('isLoggedIn');
Route::post('/edit-item', [Controller::class, 'editItem'])->name('edit-item')->middleware('isLoggedIn');
Route::get('/profile', [Controller::class, 'profile'])->middleware('isLoggedIn');
Route::post('/change-password', [Controller::class, 'changePassword'])->middleware('isLoggedIn');
Route::get('/items', [Controller::class, 'items'])->middleware('isLoggedIn');
