<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Voyages;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('pages.clients.index');
})->name('home');

Route::get('about-us',function(){
    return view('pages.clients.about-us');
})->name('nous');

Route::get('voyages',function(){
    $eventList = Voyages::all();
    return view('pages.clients.voyages')->with('list',$eventList);
})->name('trip');


// Route Admin
Route::get('dashboard-admin',function(){
    return view('pages.managers.index');
})->name('dash');
Route::get('evenement',function(){
    $eventList = Voyages::all();
    return view('pages.managers.event')->with('list',$eventList);
})->name('event');
Route::get('tansactions',function(){
    $eventList = Voyages::all();
    return view('pages.managers.transaction')->with('list',$eventList);
})->name('tansactions');

// ROute pour notre agence
Route::get('dashboard-arc',function(){
    return view('pages.arc.index');
})->name('arcDash');
Route::get('tansactions-arc',function(){
    $eventList = Voyages::all();
    return view('pages.arc.transaction')->with('list',$eventList);
})->name('tansactionsArc');
Route::get('classement',function(){
    $eventList = Voyages::all();
    return view('pages.arc.classement')->with('list',$eventList);
})->name('classement');