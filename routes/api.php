

<?php

use App\Http\Controllers\API\ApiAgences;
use App\Http\Controllers\API\ApiClients;
use App\Http\Controllers\API\ApiManagers;
use App\Models\Voyages;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('info/{id}',[ApiClients::class,'eventDetail']);

// Manager
Route::post('event-create',[ApiAgences::class,'eventCreate']);

Route::get('print-specific-event/{id}',[ApiAgences::class,'showEvent']);
