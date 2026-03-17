<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VivaBio - Catalogue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        :root {
            --sage: #7BAE7F;
            --anthracite: #2E2E2E;
            --honey: #E6B450;
            --willow: #707070;
            --off-white: #F9FAF7;
            --light-blue-green: #A7C7A9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--off-white);
            color: var(--anthracite);
            line-height: 1.6;
        }

        /* HEADER */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar > div {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--sage);
            text-decoration: none;
        }

        .menu a {
            text-decoration: none;
            color: var(--anthracite);
            font-weight: 500;
            margin-left: 1.5rem;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: var(--sage);
        }

        /* SEARCH BAR */
        .search-bar {
            display: flex;
            align-items: center;
            background: var(--off-white);
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 0.4rem 1rem;
            gap: 0.5rem;
        }

        .search-bar input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 0.95rem;
            width: 220px;
        }

        .search-bar button {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--sage);
            font-size: 1.1rem;
        }

        /* ICONS */
        .icons {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .icons a {
            text-decoration: none;
            color: var(--anthracite);
            font-size: 1.3rem;
            position: relative;
        }

        .cartAmount {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--sage);
            color: white;
            border-radius: 50%;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* BANNIERE */
        .banniere {
            background-color: var(--sage);
            color: white;
            text-align: center;
            padding: 0.6rem;
            font-size: 0.95rem;
        }

        /* CATALOGUE */
        .catalogue {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .catalogue h2 {
            font-size: 2rem;
            color: var(--sage);
            margin-bottom: 0.5rem;
        }

        .catalogue > p {
            color: var(--willow);
            margin-bottom: 2rem;
        }

        /* GRID */
        .produits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .produit-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .produit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .produit-image {
            height: 200px;
            background-color: var(--light-blue-green);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .produit-info {
            padding: 1.5rem;
        }

        .produit-info h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--anthracite);
        }

        .produit-description {
            color: var(--willow);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .produit-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .produit-prix {
            font-weight: bold;
            color: var(--sage);
            font-size: 1.2rem;
        }

        .stock-disponible {
            font-size: 0.8rem;
            color: green;
        }

        .stock-indisponible {
            font-size: 0.8rem;
            color: red;
        }

        .btn-ajouter-panier {
            background-color: var(--sage);
            color: white;
            border: none;
            padding: 0.7rem 1rem;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-ajouter-panier:hover {
            background-color: #6a9c6e;
        }

        .no-products {
            grid-column: 1 / -1;
            text-align: center;
            color: var(--willow);
            padding: 3rem;
        }

        /* FOOTER */
        footer {
            background-color: var(--anthracite);
            color: white;
            padding: 3rem 2rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            color: var(--sage);
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: var(--off-white);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--sage);
        }

        .copyright {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid var(--willow);
            text-align: center;
            color: var(--willow);
        }
    </style>
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

    {{-- BANNIERE --}}
    <div class="banniere">
        🌿 Un <strong>contour des yeux</strong> offert pour tout achat d'un sérum visage !
    </div>

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
                        <button class="btn-ajouter-panier">
                            <i class="bi bi-cart-plus"></i> Ajouter au panier
                        </button>
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