<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/posts/{grid_type}/{slug}', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');


Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
Route::get('/coming-soon', [PageController::class, 'soon'])->name('soon');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
