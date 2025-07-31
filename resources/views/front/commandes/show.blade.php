@include('layouts.head')

<body>
    <div class="container mt-5">
        <h2>Détails de la commande</h2>

        <ul class="list-group mt-4">
            <li class="list-group-item"><strong>ID:</strong> {{ $commande->id }}</li>
            <li class="list-group-item"><strong>Nom du client:</strong> {{ $commande->client_name }}</li>
            <li class="list-group-item"><strong>Email du client:</strong> {{ $commande->client_email }}</li>
            <li class="list-group-item"><strong>Téléphone:</strong> {{ $commande->client_phone }}</li>
            <li class="list-group-item"><strong>Montant Total:</strong> {{ $commande->total }} DT</li>
            <li class="list-group-item"><strong>Sous-total:</strong> {{ $commande->subtotal }} DT</li>
        </ul>

        <h3 class="mt-5">Détails des articles</h3>

        @if($commande->details && count($commande->details) > 0)
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commande->details as $detail)
                    <tr>
                        <td>{{ $detail->libelle_article }}</td>
                        <td>{{ $detail->qnt_article }}</td>
                        <td>{{ $detail->prix_article }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="mt-3">Aucun détail trouvé pour cette commande.</p>
        @endif

        <a href="{{ route('commandes.index') }}" class="btn btn-secondary mt-4">Retour à la liste</a>
    </div>
</body>



