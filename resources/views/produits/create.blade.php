<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaBio - Créer un produit</title>
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
            <h1><i class="bi bi-plus-circle"></i> Créer un produit</h1>

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

            <form action="{{ route('produits.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Nom du produit" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Description du produit..." required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="prix">Prix (€)</label>
                    <input type="number" id="prix" name="prix" step="0.01" min="0" value="{{ old('prix') }}" placeholder="0.00" required>
                </div>

                <div class="form-group">
                    <label for="quantite_stock">Quantité en stock</label>
                    <input type="number" id="quantite_stock" name="quantite_stock" min="0" value="{{ old('quantite_stock') }}" placeholder="0" required>
                </div>

                <div class="form-group">
                    <label for="seuil_alerte">Seuil d'alerte</label>
                    <input type="number" id="seuil_alerte" name="seuil_alerte" min="0" value="{{ old('seuil_alerte') }}" placeholder="0" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i>&nbsp; Créer le produit
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
