{{-- resources/views/front/commandes/edit.blade.php --}}
@include('layouts.head')

<div class="container mt-5">
    <h2 class="mb-4">Modifier les informations du client</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   <form action="{{ route('detail_commandes.updateClient', $detail->commande->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="client_name" class="form-label">Nom du client</label>
            <input type="text" name="client_name" class="form-control" value="{{ $detail->commande->client_name }}" required>
        </div>

        <div class="mb-3">
            <label for="client_surname" class="form-label">Prénom du client</label>
            <input type="text" name="client_surname" class="form-control" value="{{ $detail->commande->client_surname }}" required>
        </div>

        <div class="mb-3">
            <label for="client_phone" class="form-label">Téléphone</label>
            <input type="text" name="client_phone" class="form-control" value="{{ $detail->commande->client_phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>





