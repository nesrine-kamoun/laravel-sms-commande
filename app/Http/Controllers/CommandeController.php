<?php
namespace App\Http\Controllers;

use App\Models\DetailCommande;  // <== هذي صحيحة
use App\Models\Commande;        // إذا تستعمل موديل Commande زادة
use Illuminate\Http\Request;
use App\Models\Product;

class CommandeController extends Controller
{
    // Affichage de toutes les commandes
    
public function index()
{
    $commandes = Commande::with('details')->get();
    $products = Product::all(); // 👈 هذا هو الإضافة اللازمة

    return view('front.commandes.index', compact('commandes', 'products'));
}

public function destroy($id)
{
    $commande = Commande::findOrFail($id);

    if ($commande->statut === 'annulé') {
        $commande->delete();
        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    } else {
        return redirect()->route('commandes.index')->with('error', 'Impossible de supprimer une commande non annulée.');
    }
}

    // Affichage du formulaire de création
    public function create()
    {
        return view('front.commandes.create');
    }

    // Enregistrement d'une commande
    public function store(Request $request)
    {
        $commande = new Commande();
        $commande->client_name = $request->client_name;
        $commande->client_email = $request->client_email;
        $commande->client_phone = $request->client_phone;
        $commande->total = $request->total;
        $commande->subtotal = $request->subtotal;
        $commande->save();

        // Enregistrer les détails si fournis (optionnel)
        if ($request->has('details')) {
            foreach ($request->details as $detail) {
                DetailCommande::create([
                    'commande_id'     => $commande->id,
                    'libelle_article' => $detail['libelle_article'],
                    'qnt_article'     => $detail['qnt_article'],
                    'prix_article'    => $detail['prix_article'],
                ]);
            }
        }

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès');
    }

    // Affichage des détails d'une commande (incluant les articles)
    public function detaille($id)
    {
        $commande = Commande::with('details')->find($id);
        if (!$commande) abort(404);

        return view('front.commandes.detaille', compact('commande'));
    }

    // Affichage d'une commande seule (sans détails)
    public function show($id)
    {
        $commande = Commande::with('details')->find($id);
        return view('front.commandes.show', compact('commande'));
    }
public function editClient($id)
{
    $detail = DetailCommande::where('commande_id', $id)->first();
dd(DetailCommande::where('commande_id', $id)->first());

    if (!$detail) {
        return back()->with('error', 'Aucune commande trouvée');
    }

    return view('front.commandes.edit', compact('detail'));
}
public function updateClient(Request $request, $id)
{
    $request->validate([
        'client_name' => 'required|string|max:255',
        'client_surname' => 'required|string|max:255',
        'client_phone' => 'required|string|max:20',
    ]);

    $commande = Commande::findOrFail($id);
    $commande->client_name = $request->client_name;
    $commande->client_surname = $request->client_surname; // كان اسمها prenom بالغلط
    $commande->client_phone = $request->client_phone;
    $commande->save();

    return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès.');
}
// app/Http/Controllers/CommandeController.php


public function edit($id)
{
    $detail = DetailCommande::where('commande_id', $id)->first();

    if (!$detail) {
        return back()->with('error', 'Aucune commande trouvée');
    }

    return view('front.commandes.edit', compact('detail'));
}


} 










































