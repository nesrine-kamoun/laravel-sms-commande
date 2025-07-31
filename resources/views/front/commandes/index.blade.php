{{-- resources/views/front/commandes/index.blade.php --}}
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

        @if(count($commandes) > 0)
            <div class="table-responsive">
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
                                    <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-primary btn-sm">
                                        Voir Detail
                                    </a>
                                    <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning btn-sm">Modifier Client</a>
                                    </a>

                                    {{-- ✅ Supprimer si statut == "annulé" --}}
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
    </div>
@endsection





