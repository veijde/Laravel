<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FaqController;

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

// All articles
Route::get('/', [ArticleController::class, 'index']);

// Show create form
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('auth');

// Store article data
Route::post('/articles', [ArticleController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('auth');

// Update article
Route::put('/articles/{article}', [ArticleController::class, 'update'])->middleware('auth');

// Delete article
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->middleware('auth');

// Show manage page
Route::get('/articles/manage', [ArticleController::class, 'manage'])->middleware('auth');

// Show single article
Route::get('/articles/{article}', [ArticleController::class, 'show']);

// Show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new users
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Log out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Show profile
Route::get('/users/{user}', [UserController::class, 'show'])->middleware('auth');

// Show edit user form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

// Update user
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');

// Promote user
Route::get('/users/{user}/promote', [UserController::class, 'promote'])->middleware('auth');

// Show faq
Route::get('/faq', [FaqController::class, 'index']);

Route::delete('/faq/categories/{category}', [FaqController::class, 'destroy']);

Route::get('/about', function () {
    return view('about');
});