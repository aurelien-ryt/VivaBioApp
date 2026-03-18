<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VivaBio - Catalogue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/catalogue.css">
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

        {{-- BARRE DE RECHERCHE --}}
        <form method="GET" action="{{ route('catalogue.show') }}">
            <div class="search-bar">
                <input
                    type="text"
                    name="recherche"
                    placeholder="Rechercher un produit..."
                    value="{{ $recherche ?? '' }}"
                />
                <button type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <div class="icons">
            <a href="#" class="user"><i class="bi bi-person"></i></a>
            <a href="/catalogue/panier" class="cart">
                <i class="bi bi-cart"></i>
                <span id="cartAmount" class="cartAmount">0</span>
            </a>
        </div>
    </header>

    {{-- CATALOGUE --}}
    <section class="catalogue">
        <h2>Nos produits</h2>
        <p>Découvrez notre sélection naturelle et bio 🌸</p>

        <div class="produits-grid">
            @forelse($produits as $produit)
                <div class="produit-card">
                    <div class="produit-image">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="produit-info">
                        <h3>{{ $produit->nom }}</h3>
                        <p class="produit-description">{{ $produit->description }}</p>
                        <div class="produit-footer">
                            <span class="produit-prix">{{ $produit->prix }} €</span>
                            @if($produit->quantite_stock > 0)
                                <span class="stock-disponible">En stock ({{ $produit->quantite_stock }})</span>
                            @else
                                <span class="stock-indisponible">Rupture de stock</span>
                            @endif
                        </div>
                        <a href="{{ route('produits.show', $produit->id) }}" class="btn-consulter-produit">
                            <i class="bi bi-eye"></i> Consulter l'article
                        </a>
                    </div>
                </div>
            @empty
                <div class="no-products">
                    <p>Aucun produit trouvé.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>VivaBio</h3>
                <p>VivaBio s'engage à vous proposer des produits biologiques de qualité, respectueux de l'environnement et de votre santé.</p>
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