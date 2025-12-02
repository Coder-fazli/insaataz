<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('load-trainings', [SiteController::class, 'loadTrainings'])->name('load-trainings');
Route::get('load-gallery', [SiteController::class, 'loadGallery'])->name('load-gallery');
Route::get('load-history-images', [SiteController::class, 'loadHistoryImages'])->name('load-history-images');
Route::get('load-videos', [SiteController::class, 'loadVideo'])->name('load-videos');
Route::get('load-events', [SiteController::class, 'loadEvents'])->name('load-events');
Route::get('load-event-images/{event_id}', [SiteController::class, 'loadEventImages'])->name('load-event-image');
Route::get('load-meetings', [SiteController::class, 'loadMeetings'])->name('load-meetings');
Route::post('training-form', [SiteController::class, 'trainingForm'])->name('training-form');
Route::post('contact-form', [SiteController::class, 'contactForm'])->name('contact-form');
Route::post('email', [SiteController::class, 'emailForm'])->name('email');
 Route::get('/category', [ProductController::class, 'category'])->name('category');
Route::get('/product/quick-view/{id}', [ProductController::class, 'quickView'])->name('product.quickView');