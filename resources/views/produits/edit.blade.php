<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaBio - Modifier un produit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/gestionnaire.css">
</head>
<body>

    {{-- HEADER --}}
    <header class="navbar">
        <div>
            <a href="/" class="logo">VivaBio</a>
            <nav class="menu">
                <a href="/">Accueil</a>
                <a href="{{ route('gestionnaire.dashboard') }}">Dashboard</a>
            </nav>
        </div>
        <span class="navbar-badge">Gestionnaire</span>
    </header>

    <div class="form-page">
        <div class="form-card">
            <h1><i class="bi bi-pencil-square"></i> Modifier : {{ $produit->nom }}</h1>

            @if ($errors->any())
                <div class="form-errors">
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

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $produit->nom) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required>{{ old('description', $produit->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="prix">Prix (€)</label>
                    <input type="number" id="prix" name="prix" step="0.01" min="0" value="{{ old('prix', $produit->prix) }}" required>
                </div>

                <div class="form-group">
                    <label for="quantite_stock">Quantité en stock</label>
                    <input type="number" id="quantite_stock" name="quantite_stock" min="0" value="{{ old('quantite_stock', $produit->quantite_stock) }}" required>
                </div>

                <div class="form-group">
                    <label for="seuil_alerte">Seuil d'alerte</label>
                    <input type="number" id="seuil_alerte" name="seuil_alerte" min="0" value="{{ old('seuil_alerte', $produit->seuil_alerte) }}" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i>&nbsp; Enregistrer
                    </button>
                    <a href="{{ route('gestionnaire.dashboard') }}" class="btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="copyright">&copy; 2025 VivaBio. Tous droits réservés.</div>
    </footer>

</body>
</html>
