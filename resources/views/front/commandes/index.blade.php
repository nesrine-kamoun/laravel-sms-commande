@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Liste des Commandes</h1>

        {{-- ✅ Messages de succès ou d'erreur --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        {{-- ✅ Section Commandes --}}
        @if(count($commandes) > 0)
            <div class="table-responsive mb-5">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nom Client</th>
                            <th>Date Commande</th>
                            <th>Montant Total</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commandes as $commande)
                            <tr>
                                <td>{{ $commande->id }}</td>
                                <td>{{ $commande->nom_client }}</td>
                                <td>{{ $commande->date_commande }}</td>
                                <td>{{ number_format($commande->montant_total, 2, ',', ' ') }} TND</td>
                                <td>{{ $commande->statut }}</td>
                                <td>
                                    <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-primary btn-sm">Voir Detail</a>

                                    @if ($commande->detailCommandes && $commande->detailCommandes->isNotEmpty())
                                        <a href="{{ route('detail_commandes.editClient', $commande->detailCommandes->first()->id) }}" class="btn btn-warning btn-sm">Modifier Client</a>
                                    @endif

                                    @if($commande->statut === 'annulé')
                                        <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                Aucune commande trouvée.
            </div>
        @endif

        {{-- ✅ Section Produits --}}
        <h2 class="text-center mb-3">Liste des Produits</h2>

        {{-- ✅ Bouton Ajouter un produit --}}
        <div class="text-end mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">
                + Ajouter un produit
            </a>
        </div>

        @if($products->count())
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Libellé</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->libelle }}</td>
                                <td>{{ $product->qnt }}</td>
                                <td>{{ $product->prix }} DT</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    
                                    {{-- Bouton supprimer si aucun detail_commande ne contient ce produit --}}
                                    @if ($product->detailCommandes->isEmpty())
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Supprimer ce produit ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                Aucun produit trouvé.
            </div>
        @endif
    </div>
@endsection



