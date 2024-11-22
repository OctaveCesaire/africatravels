<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyages;

class ApiClients extends Controller
{
    //
    function eventDetail($id){
        $elt = Voyages::findOrFail($id);
        if($elt) return response()->json($elt);    
        return response()->json(['message' => 'Annonce non trouvée'], 404);
    }
}
