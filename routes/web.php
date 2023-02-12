<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Store\Index as LivewireStoreIndex;
use App\Http\Livewire\Store\Products\Index as LivewireStoreProductIndex;
use App\Http\Livewire\Store\Products\Index as LivewireStoreProductShow;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/store', LivewireStoreIndex::class)->name('store.index');
Route::get('/store/products', LivewireStoreProductIndex::class)->name('store.products.index');
Route::get('/store/products/{product}', LivewireStoreProductShow::class)->name('store.products.show');


Route::get('/posts/{grid_type}/{slug}', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');


Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
Route::get('/coming-soon', [PageController::class, 'soon'])->name('soon');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
