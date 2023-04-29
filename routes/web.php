<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Store\Index as LivewireStoreIndex;
use App\Http\Livewire\Store\Products\Index as LivewireStoreProductIndex;
use App\Http\Livewire\Store\Products\Show as LivewireStoreProductShow;
use App\Http\Livewire\Store\CartItems\Index as LivewireStoreCartItemIndex;
use App\Http\Livewire\Store\Checkout\Index as LivewireStoreCheckoutIndex;

use App\Http\Livewire\Users\Account\Overview as LivewireUserAccountOverview;
use App\Http\Livewire\Users\Account\Security as LivewireUserAccountSecurity;
use App\Http\Livewire\Users\Account\Notifications as LivewireUserAccountNotifications;
use App\Http\Livewire\Users\Account\Preferences as LivewireUserAccountPreferences;
use App\Http\Livewire\Users\Store\OrdersIndex as LivewireUserStoreOrdersIndex;
use App\Http\Livewire\Users\Store\OrdersShow as LivewireUserStoreOrdersShow;
use App\Http\Livewire\Users\Store\Wishlist as LivewireUserStoreWishlist;

//Home route

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

//Static page routes

Route::get('/faq', [PageController::class, 'faq'])
    ->name('faq');
Route::get('/downloads', [PageController::class, 'downloads'])
    ->name('downloads');
Route::get('/coming-soon', [PageController::class, 'soon'])
    ->name('soon');
Route::get('/about-us', [PageController::class, 'about'])
    ->name('about');


//Register, login, and logout
Auth::routes([
    'logout' => false,
]);


Route::get('/logout', function () {
    auth()->logout();

    return redirect()->route('home');

})->name('logout');


//Verify user email Routes

Route::middleware(['auth'])->group(function () {

    Route::get('/email/verify', [VerifyEmailController::class, 'notice'])
        ->name('verification.notice');


    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify');


    Route::post('/email/verification-notification', [VerifyEmailController::class, 'send'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
});


//Store routes

Route::get('/store', LivewireStoreIndex::class)->name('store.index');
Route::get('/store/products', LivewireStoreProductIndex::class)->name('store.products.index');
Route::get('/store/products/{product:slug}', LivewireStoreProductShow::class)->name('store.products.show');


Route::middleware(['auth', 'verified'])->group(function () {

    //Cart and checkout routes
    Route::get('/store/cart', LivewireStoreCartItemIndex::class)
        ->name('store.cartItems.index');
    Route::get('/store/checkout', LivewireStoreCheckoutIndex::class)
        ->name('store.checkout.index');


    //User account setting routes
    Route::get('/user/account/overview', LivewireUserAccountOverview::class)->name('users.account.overview');
    Route::get('/user/account/security', LivewireUserAccountSecurity::class)->name('users.account.security');
    Route::get('/user/account/notifications', LivewireUserAccountNotifications::class)->name('users.account.notifications');
    Route::get('/user/account/preferences', LivewireUserAccountPreferences::class)->name('users.account.preferences');
    Route::get('/user/store/wishlist', LivewireUserStoreWishlist::class)->name('users.store.wishlist');
    Route::get('/user/store/orders', LivewireUserStoreOrdersIndex::class)->name('users.store.orders.index');
    Route::get('/user/store/orders/{order}', LivewireUserStoreOrdersShow::class)->name('users.store.orders.show');
    Route::get('/user/store/orders/{order}/invoice', [InvoiceController::class, 'show'])->name('users.store.orders.invoice');

});


//Post routes
Route::get('/posts/{grid_type}/{slug}', [PostController::class, 'index'])
    ->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])
    ->name('posts.show');
Route::post('/posts/{slug}/comment', [CommentController::class, 'store'])
    ->name('posts.comments.store')
    ->middleware(['auth', 'verified']);


Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    //Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.overview');

    Route::get('/dashboard/users', [DashboardController::class, 'users'])
        ->name('dashboard.users');

    Route::get('/dashboard/orders', [DashboardController::class, 'orders'])
        ->name('dashboard.orders');

    Route::get('/dashboard/products', [DashboardController::class, 'products'])
        ->name('dashboard.products');

    Route::get('/dashboard/posts', [DashboardController::class, 'posts'])
        ->name('dashboard.posts');


});


