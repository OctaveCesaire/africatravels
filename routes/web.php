<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Views\ViewsAgences;
use App\Http\Controllers\Views\ViewsClients;
use App\Http\Controllers\Views\ViewsManagers;
use Illuminate\Support\Facades\Route;

/** ROUTE GUEST **/
Route::middleware('guest')->group(function(){
    Route::get('/', [ViewsClients::class,'index'])->name('home');
    Route::get('about-us',[ViewsClients::class,'about'])->name('nous');
    Route::get('voyages',[ViewsClients::class,'trip'])->name('trip');
});


Route::middleware('auth')->group(function () {
    // Route Agence
    Route::get('dashboard-admin',[ViewsAgences::class,'index'])->name('dashboard');
    Route::get('evenement',[ViewsAgences::class,'event'])->name('event');
    Route::get('tansactions',[ViewsAgences::class,'transaction'])->name('tansactions');

    // ROute pour notre Admin
    Route::get('dashboard-arc',[ViewsManagers::class,'index'])->name('arcDash');
    Route::get('tansactions-arc',[ViewsManagers::class,'transactions'])->name('tansactionsArc');
    Route::get('classement',[ViewsManagers::class,'classsement'])->name('classement');
    Route::get('analytic',[ViewsManagers::class,'analytic'])->name('analyze');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';









