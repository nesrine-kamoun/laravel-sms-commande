@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Liste des Produits</h2>

    {{-- رسائل النجاح أو الخطأ --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- زر إضافة منتج جديد --}}
    <div class="mb-3 text-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Ajouter Produit</a>
    </div>

    @if($products->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Libellé</th>
                    <th>Prix (DT)</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->libelle }}</td>
                        <td>{{ $product->prix }}</td>
                        <td>{{ $product->qnt }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun produit trouvé.</p>
    @endif
</div>
@endsection

