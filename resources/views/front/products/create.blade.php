@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Ajouter un Produit</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optionnel)</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix Unitaire</label>
            <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
        </div>

        {{-- ✅ حقل الكمية qnt --}}
        <div class="mb-3">
            <label for="qnt" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="qnt" name="qnt" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection


