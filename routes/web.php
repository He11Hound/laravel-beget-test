<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicRouteController;

Route::get('/', function () { return view('welcome'); });
Route::get('/basic', [BasicRouteController::class, 'show']);
