<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return view('front.commande.index', compact('commandes'));
    }

    public function store(Request $request)
    {
        $commande = new Commande();
        $commande->nom_client = $request->nom_client;
        $commande->date_commande = $request->date_commande;
        $commande->montant_total = $request->montant_total;
        $commande->save();

        return redirect()->route('commandes.index');
    }
}


