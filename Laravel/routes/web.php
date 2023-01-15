<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

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
Route::get('/articles/create', [ArticleController::class, 'create']);

// Store article data
Route::post('/articles', [ArticleController::class, 'store']);

// Show edit form
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);

//Update article
Route::put('/articles/{article}', [ArticleController::class, 'update']);

//Delete article
Route::delete('/articles/{article}', [ArticleController::class, 'destroy']);

// Show single article
Route::get('/articles/{article}', [ArticleController::class, 'show']);

