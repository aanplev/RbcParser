<?php

use App\Http\Controllers\NewsController;
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

Route::get('/news', [
    NewsController::class,
    'list',
]);

Route::get('/news/{id}', [
    NewsController::class,
    'item',
])->name('news.item');

Route::get('/parse', [
    NewsController::class,
    'parse',
]);
