<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\CompressImageController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ForgetPasswordController;
use Illuminate\Support\Facades\Route;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['web', 'localize']], function () {
    Route::get('/', [SiteController::class, 'index'])->name('home');
    Route::get('/product/quick-view/{id}', [ProductController::class, 'quickView'])->name('product.quickView');
    Route::get('/product/{slug}', [ProductController::class, 'product'])->name('product');
    
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/categories/{id?}', [ProductController::class, 'categories'])->name('categories');

    Route::get('/products?pagetype=maintance', [ProductController::class, 'index'])->name('products.maintance');
    
    
    Route::get('/products/get_price', [ProductController::class, 'get_price'])->name('get_price');
    Route::post('/product/add-to-cart', [ProductController::class, 'addToCart'])->name('addToCart');
    Route::post('/product/update-cart', [ProductController::class, 'updateCart'])->name('updateCart');
    Route::post('/product/remove-cart', [ProductController::class, 'removeCart'])->name('removeCart');
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    
    Route::get('/category', [ProductController::class, 'category'])->name('category');
    Route::get('/getProducts', [ProductController::class, 'getProducts'])->name('getProducts');
    Route::get('/order', [ProductController::class, 'order'])->name('order');

    Route::get('/portfolio', [SiteController::class, 'portfolio'])->name('portfolio');
    Route::get('/service/{slug}', [SiteController::class, 'service'])->name('service');
    Route::get('/services', [SiteController::class, 'services'])->name('services');
    Route::get('/about', [SiteController::class, 'about'])->name('about');
    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
    Route::post('/contact', [SiteController::class, 'contactForm'])->name('contactForm');
    Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}', [SiteController::class, 'blogDetail'])->name('blog.detail');

    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/login', [ClientController::class, 'loginForm'])->name('login');
        Route::post('/login', [ClientController::class, 'submitLoginForm'])->name('submitLoginForm');
        Route::get('/register', [ClientController::class, 'registerForm'])->name('register');
        Route::post('/register', [ClientController::class, 'submitRegisterForm'])->name('submitRegisterForm');
        
        Route::get('/forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget_password');
        Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordSubmit'])->name('forget_password.submit');
        Route::get('/confirm-password', [ForgetPasswordController::class, 'confirmPassword'])->name('confirm_password');
        Route::post('/confirm-password', [ForgetPasswordController::class, 'confirmPasswordSubmit'])->name('confirm_password.submit');
        Route::get('/change-password', [ForgetPasswordController::class, 'changePassword'])->name('change_password');
        Route::post('/change-password', [ForgetPasswordController::class, 'changePasswordSubmit'])->name('change_password.submit');

        Route::group(['middleware' => 'client.auth'], function () {
            Route::get('/add-favorite/{product}', [ClientController::class, 'addFavorite'])->name('addFavorite');
            Route::get('/remove-favorite/{product}', [ClientController::class, 'removeFromFavorite'])->name('removeFromFavorite');
            Route::get('/add-compare/{product}', [ClientController::class, 'addCompare'])->name('addCompare');
            Route::get('/remove-compare/{product}', [ClientController::class, 'removeCompare'])->name('removeFromCompare');

            Route::get('/', [ClientController::class, 'profile'])->name('index');
            Route::post('/', [ClientController::class, 'updateProfile'])->name('update');
            Route::get('/wishlist', [ClientController::class, 'wishList'])->name('wishList');
            Route::get('/compare', [ClientController::class, 'compare'])->name('compare');
            Route::get('/orders', [ClientController::class, 'showOrders'])->name('showOrders');
            Route::get('/order/{order}', [ClientController::class, 'showOneOrder'])->name('showOneOrder');
            Route::get('/logout', [ClientController::class, 'clientLogout'])->name('logout');
        });
    });

    Route::get('/activation/{activation}', [ClientController::class, 'activation'])->name('activation');
    Route::get('/changed-mail-activation/{activation}', [ClientController::class, 'mailChangeActivation'])->name('mailChangeActivation');
});

Route::get('fields/{category_id?}', [FilterController::class, 'filter'])->name('category-fields');

