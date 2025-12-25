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

// Update blog image route - Borularin Tarixi
Route::get('update-blog-image', function () {
    $blogId = 5;
    $sourcePath = public_path('temp-blog-image.jpg');
    $newFileName = 'blog/' . time() . '_borularin-tarixi.jpg';
    $destPath = storage_path('app/public/' . $newFileName);

    // Create blog directory if not exists
    if (!file_exists(storage_path('app/public/blog'))) {
        mkdir(storage_path('app/public/blog'), 0755, true);
    }

    if (file_exists($sourcePath)) {
        copy($sourcePath, $destPath);
        \DB::table('blogs')->where('id', $blogId)->update(['image' => $newFileName]);
        unlink($sourcePath);
        return "Done! Blog image updated to: {$newFileName}";
    }
    return "Error: Source image not found at {$sourcePath}";
});

// Update blog image route - Brendinqde
Route::get('update-blog-image-2', function () {
    $slug = 'brendinqde-nelere-diqqet-edilmelidir-4';
    $sourcePath = public_path('temp-blog-image-2.jpg');
    $newFileName = 'blog/' . time() . '_brendinqde.jpg';
    $destPath = storage_path('app/public/' . $newFileName);

    // Create blog directory if not exists
    if (!file_exists(storage_path('app/public/blog'))) {
        mkdir(storage_path('app/public/blog'), 0755, true);
    }

    if (file_exists($sourcePath)) {
        // Copy file to storage
        copy($sourcePath, $destPath);

        // Update database by slug
        $updated = \DB::table('blogs')
            ->whereRaw("slug LIKE ?", ["%{$slug}%"])
            ->update(['image' => $newFileName]);

        // Delete temp file
        unlink($sourcePath);

        return "Done! Blog image updated to: {$newFileName} (Updated {$updated} post)";
    }

    return "Error: Source image not found at {$sourcePath}";
});

// Debug and update routes (no locale prefix)
Route::get('debug-blog-post', function () {
    $posts = \DB::table('blogs')
        ->whereRaw("slug LIKE ?", ['%borularin-tarixi%'])
        ->get(['id', 'title', 'image', 'slug']);

    $output = "<h2>Blog posts found:</h2><pre>";
    foreach ($posts as $p) {
        $output .= "ID: {$p->id}\n";
        $output .= "Slug: {$p->slug}\n";
        $output .= "Title: {$p->title}\n";
        $output .= "Image: {$p->image}\n\n";
    }
    if ($posts->isEmpty()) {
        $output .= "No posts found!";
    }
    $output .= "</pre>";
    return $output;
});

// Debug route to find products to exclude from Fondital search
Route::get('/debug-exclude-products', function () {
    $output = "<h2>Products to exclude from Fondital search:</h2><pre>";

    // Boru Rezini
    $products = \DB::table('products')
        ->whereRaw("LOWER(JSON_EXTRACT(title, '$.az')) LIKE ?", ['%boru rezini%'])
        ->get(['id', 'title', 'category_id']);

    foreach ($products as $p) {
        $output .= "ID: {$p->id} | Category: {$p->category_id}\n";
        $output .= "Title: {$p->title}\n\n";
    }

    // Kompozit Boru PN 25
    $products2 = \DB::table('products')
        ->whereRaw("LOWER(JSON_EXTRACT(title, '$.az')) LIKE ?", ['%kompozit boru pn 25%'])
        ->get(['id', 'title', 'category_id']);

    foreach ($products2 as $p) {
        $output .= "ID: {$p->id} | Category: {$p->category_id}\n";
        $output .= "Title: {$p->title}\n\n";
    }

    $output .= "</pre>";
    return $output;
});

// Debug route to find products
Route::get('/debug-fondital-products', function () {
    $names = ['victoria', 'minorca', 'maiorca', 'formentera', 'antea', 'tahiti', 'bali', 'calidor'];
    $output = "<h2>Products found:</h2><pre>";

    foreach ($names as $name) {
        $products = \DB::table('products')
            ->whereRaw("LOWER(title) LIKE ?", ["%{$name}%"])
            ->get(['id', 'title', 'category_id']);

        foreach ($products as $p) {
            $output .= "ID: {$p->id} | Category: {$p->category_id}\n";
            $output .= "Title: {$p->title}\n\n";
        }
    }

    $output .= "</pre>";
    return $output;
});

// Update route
Route::get('/update-fondital-products-2024', function () {
    $names = ['victoria', 'minorca', 'maiorca', 'formentera', 'antea', 'tahiti', 'bali', 'calidor'];
    $updated = 0;
    $results = [];

    foreach ($names as $name) {
        $products = \DB::table('products')
            ->whereRaw("LOWER(title) LIKE ?", ["%{$name}%"])
            ->get();

        foreach ($products as $product) {
            $title = json_decode($product->title, true);
            $changed = false;

            foreach (['az', 'en', 'ru'] as $lang) {
                if (isset($title[$lang]) && !empty($title[$lang])) {
                    if (stripos($title[$lang], 'Fondital') !== 0) {
                        $title[$lang] = 'Fondital ' . $title[$lang];
                        $changed = true;
                    }
                }
            }

            if ($changed) {
                \DB::table('products')
                    ->where('id', $product->id)
                    ->update(['title' => json_encode($title, JSON_UNESCAPED_UNICODE)]);
                $updated++;
                $results[] = $title['az'] ?? $title['en'];
            }
        }
    }

    return "Done! Updated {$updated} products:<br><pre>" . implode("\n", $results) . "</pre>";
});
