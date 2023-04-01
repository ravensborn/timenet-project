<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Store\Index as LivewireStoreIndex;
use App\Http\Livewire\Store\Products\Index as LivewireStoreProductIndex;
use App\Http\Livewire\Store\Products\Show as LivewireStoreProductShow;
use App\Http\Livewire\Store\CartItems\Index as LivewireStoreCartItemIndex;
use App\Http\Livewire\Store\Checkout\Index as LivewireStoreCheckoutIndex;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/logout', function () {
    auth()->logout();

    return redirect()->route('home');

})->name('logout');


Auth::routes([
    'logout' => false,
]);


Route::get('/store', LivewireStoreIndex::class)->name('store.index');
Route::get('/store/products', LivewireStoreProductIndex::class)->name('store.products.index');
Route::get('/store/products/{product:slug}', LivewireStoreProductShow::class)->name('store.products.show');
Route::get('/store/cart', LivewireStoreCartItemIndex::class)->name('store.cartItems.index');
Route::get('/store/checkout', LivewireStoreCheckoutIndex::class)->name('store.checkout.index');

Route::get('/posts/{grid_type}/{slug}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/{slug}/comment', [CommentController::class, 'store'])->name('posts.comments.store');


Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
Route::get('/coming-soon', [PageController::class, 'soon'])->name('soon');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
