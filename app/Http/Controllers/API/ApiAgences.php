<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyages;

class ApiAgences extends Controller
{
    //
    function eventCreate(Request $data) {
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
    }
    function showEvent($id){
        return response()->json(Voyages::findOrFail($id));
    }
}
