<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ItemController::class, 'onFilterChange']);
Route::get('/report', [ItemController::class, 'report'])->middleware('isLoggedIn');
Route::get('/borrow', [ItemController::class, 'borrowItem'])->middleware('isLoggedIn');
Route::get('/items', [ItemController::class, 'items'])->middleware('isLoggedIn');
Route::post('/', [ItemController::class, 'onFilterChange']);
Route::post('/edit-item', [ItemController::class, 'editItem'])->name('edit-item')->middleware('isLoggedIn');
Route::post('/delete-item', [ItemController::class, 'removeItem'])->middleware('isLoggedIn');
Route::post('/save-item', [ItemController::class, 'saveItem'])->middleware('isLoggedIn');
Route::post('/return-item', [ItemController::class, 'returnItem'])->middleware('isLoggedIn');



Route::get('/profile', [UserController::class, 'profile'])->middleware('isLoggedIn');
Route::post('/edit-user', [UserController::class, 'editUser'])->middleware('isLoggedIn');
Route::post('/delete-user', [UserController::class, 'removeUser'])->middleware('isLoggedIn');
Route::post('/change-password', [UserController::class, 'changePassword'])->middleware('isLoggedIn');
Route::post('/save-user', [UserController::class, 'saveUser'])->middleware('isLoggedIn');


Route::get('/keywords', [KeywordController::class, 'keywords'])->middleware('isLoggedIn');
Route::post('/delete-keyword', [KeywordController::class, 'removeKeyword'])->middleware('isLoggedIn');
Route::post('/save-keyword', [KeywordController::class, 'saveKeyword'])->name('add-keyword')->middleware('isLoggedIn');
Route::post('/edit-keyword', [KeywordController::class, 'editKeyword'])->middleware('isLoggedIn');


Route::get('/login', [CustomAuthController::class, 'login']);
Route::get('/register', [CustomAuthController::class, 'register'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logoutUser']);
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
