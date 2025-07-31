@extends('front.body')

@section('content')
<div class="container mt-5">
    <h2>Ajouter une nouvelle commande</h2>
    <form action="{{ route('commandes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nom Client</label>
            <input type="text" name="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="client_email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Téléphone</label>
            <input type="text" name="client_phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Sous-total</label>
            <input type="number" step="0.01" name="subtotal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Total</label>
            <input type="number" step="0.01" name="total" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection


