<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'login');

// Authentication
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/login', [UserController::class, 'check_credential'])->middleware('guest');
Route::get('/register', [HomeController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// Home
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

// Liked
Route::get('/liked', [UserController::class, 'liked'])->middleware('auth');
Route::get('/user/{id}', [HomeController::class, 'like'])->middleware('auth');
Route::get('/dislike/{id}', [HomeController::class, 'dislike'])->middleware('auth');

// Profile
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/profile/addcoin', [UserController::class, 'addcoin'])->middleware('auth');
Route::post('/profile/changeVisibility', [UserController::class, 'changeVisibility'])->middleware('auth');
Route::get('/avatar/{id}', [UserController::class, 'buyAvatar'])->middleware('auth');