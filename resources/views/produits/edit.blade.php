<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
</head>
<body>
    <h1>Modifier le produit : {{ $produit->nom }}</h1>

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

    <form action="{{ route('produits.update', $produit) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $produit->nom) }}" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $produit->description) }}</textarea>
        </div>

        <div>
            <label for="prix">Prix (€) :</label>
            <input type="number" id="prix" name="prix" step="0.01" min="0" value="{{ old('prix', $produit->prix) }}" required>
        </div>

        <div>
            <label for="quantite_stock">Quantité en stock :</label>
            <input type="number" id="quantite_stock" name="quantite_stock" min="0" value="{{ old('quantite_stock', $produit->quantite_stock) }}" required>
        </div>

        <div>
            <label for="seuil_alerte">Seuil d'alerte :</label>
            <input type="number" id="seuil_alerte" name="seuil_alerte" min="0" value="{{ old('seuil_alerte', $produit->seuil_alerte) }}" required>
        </div>

        <div>
            <button type="submit">Mettre à jour</button>
            <a href="{{ route('produits.index') }}">Annuler</a>
        </div>
    </form>
</body>
</html>