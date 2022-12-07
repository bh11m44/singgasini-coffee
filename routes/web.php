<?php

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

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
// Route::delete('/wishlist/{id}', 'WishlistController@delete')->name('wishlist-delete');

Route::get('/all-products', 'AllProductsController@index')->name('all-products');

// Route::get('/all-store', 'StoreDetailController@index')->name('all-store');
// Route::get('/all-store/{id}', 'StoreDetailController@detail')->name('all-store-details');

// Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/product-details/{id}', 'ProductDetailsController@index')->name('product-details');
Route::post('/product-details/{id}', 'ProductDetailsController@addCart')->name('product-details-add-cart');

// Route::post('/wishlist/{id}', 'ProductDetailsController@addWishlist')->name('product-details-add-wishlist');

Route::get('/success', 'CartController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::group(['middleware' => ['auth']], function(){

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

    Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    Route::get('/dashboard-penjual', 'DashboardPenjualController@index')->name('dashboard-penjual');
    Route::get('/dashboard-penjual/panduan', 'DashboardPenjualController@panduan')->name('dashboard-penjual-panduan');
    Route::get('/dashboard-penjual/products', 'DashboardPenjualProductController@index')->name('dashboard-penjual-product');
    Route::get('/dashboard-penjual/products/create', 'DashboardPenjualProductController@create')->name('dashboard-penjual-product-create');
    Route::post('/dashboard-penjual/products/', 'DashboardPenjualProductController@store')->name('dashboard-penjual-product-store');
    Route::get('/dashboard-penjual/products/{id}', 'DashboardPenjualProductController@detail')->name('dashboard-penjual-product-details');
    Route::post('/dashboard-penjual/products/{id}', 'DashboardPenjualProductController@update')->name('dashboard-penjual-product-details-update');
    Route::delete('/dashboard-penjual/products/{id}', 'DashboardPenjualProductController@delete')->name('dashboard-penjual-product-details-delete');
    Route::post('/dashboard-penjual/products/gallery/upload', 'DashboardPenjualProductController@uploadGallery')->name('dashboard-penjual-product-details-update-gallery-upload');
    Route::get('/dashboard-penjual/products/gallery/delete/{id}', 'DashboardPenjualProductController@deleteGallery')->name('dashboard-penjual-product-details-update-gallery-delete');
    Route::get('/dashboard-penjual/transaction', 'DashboardPenjualTransactionController@index')->name('dashboard-penjual-transaction');
    Route::get('/dashboard-penjual/transaction/{id}', 'DashboardPenjualTransactionController@details')->name('dashboard-penjual-transaction-details');
    Route::post('/dashboard-penjual/transaction/{id}', 'DashboardPenjualTransactionController@update')->name('dashboard-penjual-transaction-details-update');
    Route::get('/dashboard-penjual/store', 'DashboardPenjualSettingController@store')->name('dashboard-penjual-store');
    Route::post('/dashboard-penjual/store/{redirect}', 'DashboardPenjualSettingController@updateStore')->name('dashboard-penjual-store-redirect');
    Route::get('/dashboard-penjual/account', 'DashboardPenjualSettingController@account')->name('dashboard-penjual-account');
    Route::post('/dashboard-penjual/account/{redirect}', 'DashboardPenjualSettingController@updateAccount')->name('dashboard-penjual-account-redirect');

    Route::get('/dashboard-pembeli', 'DashboardPembeliController@index')->name('dashboard-pembeli');
    Route::get('/dashboard-pembeli/transaction', 'DashboardPembeliTransactionController@index')->name('dashboard-pembeli-transaction');
    Route::get('/dashboard-pembeli/transaction/{id}', 'DashboardPembeliTransactionController@details')->name('dashboard-pembeli-transactions-details');
    // Route::post('/rating/{id}', 'DashboardPembeliTransactionController@addRating')->name('dashboard-pembeli-transactions-details-add-rating');
    // Route::post('/review/{id}', 'DashboardPembeliTransactionController@addReview')->name('dashboard-pembeli-transactions-details-add-review');
    Route::get('/dashboard-pembeli/account', 'DashboardPembeliSettingController@account')->name('dashboard-pembeli-account');
    Route::post('/dashboard-pembeli/account/{redirect}', 'DashboardPembeliSettingController@update')->name('dashboard-pembeli-redirect');
});

Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', 'DashboardAdminController@index')->name('dashboard-admin');
        // Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });

// Route::prefix('penjual')
//     ->namespace('Penjual')
//     ->middleware(['auth', 'penjual'])
//     ->group(function(){
//         Route::get('/dashboard-penjual', 'DashboardPenjualController@index')->name('dashboard-penjual');
//         Route::get('/dashboard-penjual/products', 'DashboardPenjualProductController@index')->name('dashboard-penjual-product');
//         Route::get('/dashboard-penjual/products/create', 'DashboardPenjualProductController@create')->name('dashboard-penjual-product-create');
//         Route::post('/dashboard-penjual/products/', 'DashboardPenjualProductController@store')->name('dashboard-penjual-product-store');
//         Route::get('/dashboard-penjual/products/{id}', 'DashboardPenjualProductController@detail')->name('dashboard-penjual-product-details');
//         Route::post('/dashboard-penjual/products/{id}', 'DashboardPenjualProductController@update')->name('dashboard-penjual-product-details-update');
//         Route::delete('/dashboard-penjual/products/{id}', 'DashboardPenjualProductController@delete')->name('dashboard-penjual-product-details-delete');
//         Route::post('/dashboard-penjual/products/gallery/upload', 'DashboardPenjualProductController@uploadGallery')->name('dashboard-penjual-product-details-update-gallery-upload');
//         Route::get('/dashboard-penjual/products/gallery/delete/{id}', 'DashboardPenjualProductController@deleteGallery')->name('dashboard-penjual-product-details-update-gallery-delete');
//         Route::get('/dashboard-penjual/transaction', 'DashboardPenjualTransactionController@index')->name('dashboard-penjual-transaction');
//         Route::get('/dashboard-penjual/transaction/{id}', 'DashboardPenjualTransactionController@details')->name('dashboard-penjual-transaction-details');
//         Route::post('/dashboard-penjual/transaction/{id}', 'DashboardPenjualTransactionController@update')->name('dashboard-penjual-transaction-details-update');
//         Route::get('/dashboard-penjual/store', 'DashboardPenjualSettingController@store')->name('dashboard-penjual-store');
//         Route::get('/dashboard-penjual/account', 'DashboardPenjualSettingController@account')->name('dashboard-penjual-account');
//         Route::post('/dashboard-penjual/account/{redirect}', 'DashboardPenjualSettingController@update')->name('dashboard-penjual-redirect');
//     });

Auth::routes();


