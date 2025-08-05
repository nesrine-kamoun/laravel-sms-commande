<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('front.products.index', compact('products'));
    }

    public function create()
    {
        return view('front.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'qnt' => 'required|integer|min:1',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit(Product $product)
    {
        return view('front.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix_unitaire' => 'required|numeric|min:0',
            'qnt' => 'required|integer|min:1',
        ]);

        $product->update([
            'libelle' => $validated['libelle'],
            'description' => $validated['description'] ?? null,
            'prix' => $validated['prix_unitaire'],
            'qnt' => $validated['qnt'],
        ]);

        return redirect()->route('products.index')->with('success', 'Produit modifié avec succès.');
    }
    public function destroy(Product $product)
{
    if ($product->detailCommandes()->count() > 0) {
        return redirect()->back()->with('error', 'Impossible de supprimer ce produit car il est utilisé dans une commande.');
    }

    $product->delete();
    return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
}

}


