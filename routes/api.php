<?php

use App\Models\Voyages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('info/{id}',function($id){
    $elt = Voyages::findOrFail($id);
    if($elt) return response()->json($elt);    
    return response()->json(['message' => 'Annonce non trouvée'], 404);
});

// Manager
Route::post('event-create', function (Request $data) {
    try {
        // Validation des données
        $validatedData = $data->validate([
            'titre' => 'required|string',
            'date' => 'required|date',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif,bmp'
        ],[
            'titre.required' =>"Un titre est requis",
            'date.required' =>"Une date du début de l'évènement est requis",
            'description.required' =>"Une description est requis",
            'prix.required' =>"Un prix est requis",
            'image.required' => 'Le champ image est obligatoire.',
            'image.mimes' => 'Le fichier doit être une image de type : jpg, jpeg, png, gif, bmp.',
        ]);
        Voyages::create([
            'titre' => $data->titre,
            'eventDate' => $data->date,
            'description' => $data->description,
            'prix' => $data->prix,
            // 'image' => $data->image
        ]);

        // Simuler une création réussie
        return response()->json([
            'message' => 'Événement créé avec succès',
            'data' => $validatedData
        ], 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Retourner les erreurs de validation
        return response()->json([
            'errors' => $e->errors()
        ], 422); // Code HTTP pour erreur de validation
    }
});

Route::get('print-specific-event/{id}',function($id){
    return response()->json(Voyages::findOrFail($id));
});

Route::get('print-specific-event/{id}',function($id){
    return response()->json(Voyages::findOrFail($id));
});