
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Modifier Produit</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" name="libelle" id="libelle" class="form-control" value="{{ old('libelle', $product->libelle) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (facultatif)</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prix_unitaire" class="form-label">Prix unitaire</label>
            <input type="number" step="0.01" name="prix_unitaire" id="prix_unitaire" class="form-control" value="{{ old('prix_unitaire', $product->prix_unitaire) }}" required>
        </div>

        <div class="mb-3">
            <label for="qnt" class="form-label">Quantité</label>
            <input type="number" name="qnt" id="qnt" class="form-control" value="{{ old('qnt', $product->qnt) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
