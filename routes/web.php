<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\PageController::class, 'index'])->name('about');
Route::get('/tourist-sites', [App\Http\Controllers\TouristSiteController::class, 'index'])->name('tourist.sites');
Route::get('/tourist-sites/{id}', [App\Http\Controllers\TouristSiteController::class, 'show'])->name('tourist.site.details');
Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events');
Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('event.details');
Route::get('/agencies', [App\Http\Controllers\AgencyController::class, 'index'])->name('agencies');
Route::get('/agencies/{id}', [App\Http\Controllers\AgencyController::class, 'show'])->name('agency.details');
Route::get('/galleries', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});


Route::group(['prefix' => 'sudashboard'], function () {
    Voyager::routes();
});
