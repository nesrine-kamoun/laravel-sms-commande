<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailCommande;
use App\Models\Commande;

class DetailCommandeController extends Controller
{
    // Afficher le formulaire de modification du client
  public function editClient($id)
{
    $detail = DetailCommande::with('commande')->findOrFail($id);
    return view('front.commandes.edit', compact('detail'));
}


    // Enregistrer les modifications du client
    public function updateClient(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_surname' => 'required|string|max:255',
            'client_phone' => 'required|string|max:20',
        ]);

        // Récupérer la commande associée au détail
        $detail = DetailCommande::with('commande')->findOrFail($id);
        $commande = $detail->commande;

        // Modifier les données du client
        $commande->client_name = $request->input('client_name');
        $commande->client_surname = $request->input('client_surname');
        $commande->client_phone = $request->input('client_phone');
        $commande->save();

        return redirect()->route('detail_commandes.editClient', $id)
                         ->with('success', 'Informations client mises à jour avec succès.');
    }
}


