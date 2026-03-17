<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un produit</title>
</head>
<body>
    <h1>Créer un nouveau produit</h1>

    @if ($errors->any())
        <div>
            <strong>Erreurs :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="prix">Prix (€) :</label>
            <input type="number" id="prix" name="prix" step="0.01" min="0" value="{{ old('prix') }}" required>
        </div>

        <div>
            <label for="quantite_stock">Quantité en stock :</label>
            <input type="number" id="quantite_stock" name="quantite_stock" min="0" value="{{ old('quantite_stock') }}" required>
        </div>

        <div>
            <label for="seuil_alerte">Seuil d'alerte :</label>
            <input type="number" id="seuil_alerte" name="seuil_alerte" min="0" value="{{ old('seuil_alerte') }}" required>
        </div>

        <div>
            <button type="submit">Créer</button>
            <a href="{{ route('gestionnaire.dashboard') }}">Annuler</a>
        </div>
    </form>
</body>
</html>