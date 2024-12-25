<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fee;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $fields = ['id','status','event_id'];
    $data = Fee::select($fields)->paginate(9)->withQueryString();
    $transactionStats = Fee::selectRaw('status, COUNT(*) as count')
    ->groupBy('status')
    ->get();

    // Ajout des graphiques pour les transactions
    $chartData = $transactionStats->map(function ($stat) {
        return ['label' => $stat->status, 'value' => $stat->count];
    });

    return view('dashboard',compact(['data','fields','chartData']));
})->middleware(['auth', 'verified'])->name('dashboard');

// Actions d'ajout, delete et edit

Route::prefix('action')->group(function () {
    Route::get('{type?}', function ($type=null) {
        $fields = ['id','status','event_id'];
        $data = Fee::select($fields)->paginate(9)->withQueryString();
        // Vérification des données
        return view('actions', compact('data', 'fields','type'));
    })->middleware(['auth', 'verified'])->name('action');


    Route::get('{type}/{request?}', function ($type,$request=null) {
        // Vérification des données
        $res= $request ? Fee::findOrFail($request) : null;
        // else $res =null;
        return view('pages.managers.edit',compact('type','request'));
    })->middleware(['auth', 'verified'])->name('updateAction');

    Route::delete('delete', function (Request $request) {
        // Vérification des données;
        $ids = $request->input('ids');
        if(empty($ids))
            return response()->json(['message'=>'Any Element deleted.'], 400);
        Fee::destroy($ids);
        return response()->json(['message' => 'Deleted Successfully.']);
    })->middleware(['auth', 'verified'])->name('deleteAction');
    Route::put('resolved',function(Request $request){
        $ids = $request->input('ids');
        if(empty($ids))
            return response()->json(['message'=>'Any Element deleted.'], 400);
        Fee::whereIn('id', $ids)->update(['status' => 'done']);
        return response()->json(['message' => 'Updated Successfully.']);
    })->middleware(['auth','verified'])->name('resolvedAction');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
