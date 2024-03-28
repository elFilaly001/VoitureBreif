<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceEsctimateController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $similarCars = Voiture::where('marque', $data['marque'])
            ->where('modele', $data['modele'])
            ->where('annee', $data['annee'])
            ->get();

        if ($similarCars->isEmpty()) {
            return response()->json(['message' => 'No similar cars found'], 404);
        }

        $totalPrice = $similarCars->sum('prix');
        $estimatedPrice = $totalPrice / $similarCars->count();

        return response()->json(['estimatedPrice' => $estimatedPrice]);
    }
}
