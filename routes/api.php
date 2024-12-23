

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


Route::get('avis/{id}',function($id){
    $avis = [
        1=>[
            'nom' => 'Ahmed MAMA',
            'event'=> 'Gloire de dieu',
            'note'=> '3.5',
            'avis'=> " J'ai aimé le moment passé lors de ce évènements car j'ai pu découvrir plus de lieu que je ne saurai dire"
        ],
        2=>[
            'nom' => 'Abdel MAMA',
            'event'=> 'Gloire de rencontre',
            'note'=> '1.5',
            'avis'=> " J'ai aimé le moment passé lors de ce évènements car j'ai pu découvrir plus de lieu que je ne saurai dire"
        ]
    ];
    // dd();
    return response()->json($avis[$id]);

});