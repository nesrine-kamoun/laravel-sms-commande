
@extends('front.body')

@section('title', 'Liste des Commandes')

@section('content')
    <h1 class="text-center mb-4">Liste des Commandes</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nom Client</th>
                <th>Date Commande</th>
                <th>Montant Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->nom_client }}</td>
                    <td>{{ $commande->date_commande }}</td>
                    <td>{{ $commande->montant_total }}</td>
                    <td>
                        <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-primary btn-sm">
                            Show detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Aucune commande trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
