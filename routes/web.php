<?php

use App\Models\Voyages;
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
Route::get('dashboard',function(){
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