<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VivaBio - {{ $produit->nom }}</title>
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

        .menu a:hover { color: var(--sage); }

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

        .banniere {
            background-color: var(--sage);
            color: white;
            text-align: center;
            padding: 0.6rem;
            font-size: 0.95rem;
        }

        /* CONTENU PRODUIT */
        .produit-detail {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .retour {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: var(--willow);
            margin-bottom: 1.5rem;
            transition: color 0.3s;
        }

        .retour:hover { color: var(--sage); }

        .produit-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
        }

        .produit-image {
            background-color: var(--light-blue-green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            color: white;
            min-height: 350px;
        }

        .produit-info {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .produit-info h1 {
            font-size: 1.8rem;
            color: var(--anthracite);
        }

        .produit-description {
            color: var(--willow);
            font-size: 1rem;
            line-height: 1.7;
        }

        .produit-prix {
            font-size: 2rem;
            font-weight: bold;
            color: var(--sage);
        }

        .produit-stock {
            font-size: 0.9rem;
        }

        .stock-disponible { color: green; }
        .stock-indisponible { color: red; }

        .produit-meta {
            background: var(--off-white);
            border-radius: 8px;
            padding: 1rem;
            font-size: 0.9rem;
            color: var(--willow);
        }

        .produit-meta p {
            margin-bottom: 0.4rem;
        }

        .produit-meta span {
            font-weight: bold;
            color: var(--anthracite);
        }

        .btn-ajouter-panier {
            background-color: var(--sage);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-ajouter-panier:hover { background-color: #6a9c6e; }
        .btn-ajouter-panier:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        /* FOOTER */
        footer {
            background-color: var(--anthracite);
            color: white;
            padding: 3rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 { color: var(--sage); margin-bottom: 1rem; }
        .footer-section ul { list-style: none; }
        .footer-section li { margin-bottom: 0.5rem; }
        .footer-section a { color: var(--off-white); text-decoration: none; }
        .footer-section a:hover { color: var(--sage); }

        .copyright {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid var(--willow);
            text-align: center;
            color: var(--willow);
        }

        @media (max-width: 768px) {
            .produit-container {
                grid-template-columns: 1fr;
            }
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
        <div class="icons">
            <a href="#"><i class="bi bi-person"></i></a>
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
                <button class="btn-ajouter-panier" {{ $produit->quantite_stock == 0 ? 'disabled' : '' }}>
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