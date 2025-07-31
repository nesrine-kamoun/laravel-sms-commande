<!DOCTYPE html>
<html lang="fr">
@include('layouts.head')
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Détail de la Commande #{{ $commande->id }}</h2>

    <div class="card mb-4">
        <div class="card-header">
            Informations sur la commande
        </div>
        <div class="card-body">
            <p><strong>Nom du client :</strong> {{ $commande->nom_client }}</p>
            <p><strong>Date de la commande :</strong> {{ $commande->date_commande }}</p>
            <p><strong>Montant total :</strong> {{ number_format($commande->montant_total, 2, ',', ' ') }} TND</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Articles de la commande
        </div>
        <div class="card-body p-0">
            @if(count($detaille_commande) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Libellé Article</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detaille_commande as $index => $article)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $article->libelle_article }}</td>
                                    <td>{{ $article->qnt_article }}</td>
                                    <td>{{ number_format($article->prix_article, 2, ',', ' ') }} TND</td>
                                    <td>{{ number_format($article->prix_article * $article->qnt_article, 2, ',', ' ') }} TND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted">Aucun article pour cette commande.</p>
            @endif
        </div>
    </div>
    <div class="mt-4 text-end">
        <a href="/commandes" class="btn btn-secondary">← Retour à la liste</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
