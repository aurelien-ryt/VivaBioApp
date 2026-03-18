<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VivaBio - {{ $produit->nom }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/produit.css">
</head>

<body>

    {{-- HEADER --}}
    <header class="navbar">
        <div>
            <a href="/" class="logo">VivaBio</a>
            <nav class="menu">
                <a href="/">Accueil</a>
                <a href="/catalogue">Catalogue</a>
            </nav>
        </div>
        <div class="icons">
            <a href="#"><i class="bi bi-person"></i></a>
            <a href="/catalogue/panier" class="cart">
                <i class="bi bi-cart"></i>
                <span id="cartAmount" class="cartAmount">0</span>
            </a>
        </div>
    </header>

    {{-- DETAIL PRODUIT --}}
    <div class="produit-detail">

        {{-- Bouton retour --}}
        <a href="{{ route('catalogue.show') }}" class="retour">
            <i class="bi bi-arrow-left"></i> Retour au catalogue
        </a>

        <div class="produit-container">

            {{-- Image --}}
            <div class="produit-image">
                <i class="bi bi-box-seam"></i>
            </div>

            {{-- Infos --}}
            <div class="produit-info">
                <h1>{{ $produit->nom }}</h1>

                <p class="produit-description">{{ $produit->description }}</p>

                <div class="produit-prix">{{ $produit->prix }} €</div>

                {{-- Stock --}}
                @if($produit->quantite_stock > 0)
                    <p class="produit-stock stock-disponible">
                        <i class="bi bi-check-circle"></i> En stock ({{ $produit->quantite_stock }} disponibles)
                    </p>
                @else
                    <p class="produit-stock stock-indisponible">
                        <i class="bi bi-x-circle"></i> Rupture de stock
                    </p>
                @endif

                {{-- Infos supplémentaires --}}
                <div class="produit-meta">
                    <p>Seuil d'alerte : <span>{{ $produit->seuil_alerte }}</span></p>
                    <p>Référence : <span>#{{ $produit->id }}</span></p>
                </div>

                {{-- Bouton panier --}}
                <button class="consulter-produit" {{ $produit->quantite_stock == 0 ? 'disabled' : '' }}>
                    <i class="bi bi-cart-plus"></i> Ajouter au panier
                </button>
            </div>

        </div>
    </div>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>VivaBio</h3>
                <p>VivaBio s'engage à vous proposer des produits biologiques de qualité.</p>
            </div>
            <div class="footer-section">
                <h3>Liens rapides</h3>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/catalogue">Catalogue</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <ul>
                    <li>123 Rue des Bios, 75000 Paris</li>
                    <li>contact@vivabio.com</li>
                    <li>01 23 45 67 89</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 VivaBio. Tous droits réservés.
        </div>
    </footer>

</body>
</html>