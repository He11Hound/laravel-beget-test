<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicRouteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home'); // для замены url в вёрстке href

// Специфический маршрут для тега должен быть выше
Route::get('/blog/tag/{tag}/', [ArticleController::class, 'tag'])->name('article.tag');

// Маршруты для категорий и статей
Route::get('/blog/{category}/', [ArticleController::class, 'category'])->name('article.category');
Route::get('/blog/{category}/{article}/', [ArticleController::class, 'show'])->name('article.show');
Route::get('/blog/', [ArticleController::class, 'index'])->name('article.index');
Route::get('/search/', [ArticleController::class, 'search'])->name('article.search');

Route::get('/about/', [HomeController::class, 'about'])->name('about');
