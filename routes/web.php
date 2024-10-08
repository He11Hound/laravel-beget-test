<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicRouteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home'); //для заменения url в вёрстке href
Route::get('/blog/', [ArticleController::class, 'index'])->name('article.index');
Route::get('/blog/{category}/', [ArticleController::class, 'category'])->name('article.category');
Route::get('/blog/{category}/{article}/', [ArticleController::class, 'show'])->name('article.show');
Route::get('/blog/tag/{tag}/', [ArticleController::class, 'tag'])->name('article.tag');

Route::get('/about/', [HomeController::class, 'about'])->name('about');

