<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaBio - Mon panier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/produit.css">
    <style>
        .panier-detail {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .panier-detail h1 {
            font-size: 2rem;
            color: var(--sage);
            margin-bottom: 1.5rem;
        }

        .panier-vide {
            text-align: center;
            padding: 4rem 0;
            color: var(--willow);
        }

        .panier-vide i {
            font-size: 3.5rem;
            color: var(--light-blue-green);
            display: block;
            margin-bottom: 1rem;
        }

        .panier-vide a {
            display: inline-block;
            margin-top: 1.5rem;
            background-color: var(--sage);
            color: white;
            text-decoration: none;
            padding: 0.7rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .panier-vide a:hover { background-color: #6a9c6e; }

        .panier-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            overflow: hidden;
        }

        .panier-table thead {
            background-color: var(--off-white);
        }

        .panier-table th {
            padding: 1rem 1.2rem;
            text-align: left;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--willow);
            border-bottom: 1px solid #eee;
        }

        .panier-table td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid #f0f0f0;
            color: var(--anthracite);
            vertical-align: middle;
        }

        .panier-table tbody tr:last-child td {
            border-bottom: none;
        }

        .panier-table tbody tr:hover {
            background-color: #fafff8;
        }

        .produit-nom {
            font-weight: 600;
        }

        .prix {
            color: var(--sage);
            font-weight: 600;
        }

        .btn-supprimer {
            background: none;
            border: 1px solid #e53935;
            color: #e53935;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-supprimer:hover { background-color: #FDECEA; }

        .panier-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1.5rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .panier-total {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--anthracite);
        }

        .panier-total span {
            color: var(--sage);
        }

        .btn-valider {
            background-color: var(--sage);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-valider:hover { background-color: #6a9c6e; }
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
                <a href="{{ route('commande.show') }}">Commandes</a>
            </nav>
        </div>
        <div class="icons">
            <a href="{{ route('profil.user') }}"><i class="bi bi-person"></i></a>
            <a href="/panier" class="cart">
                <i class="bi bi-cart"></i>
            </a>
        </div>
    </header>

    <div class="panier-detail">

        <a href="{{ route('catalogue.show') }}" class="retour">
            <i class="bi bi-arrow-left"></i> Retour au catalogue
        </a>

        <h1><i class="bi bi-cart3"></i> Mon panier</h1>

        @if(empty($lignes) || count($lignes) == 0)
            <div class="panier-vide">
                <i class="bi bi-cart-x"></i>
                <p>Votre panier est vide.</p>
                <a href="{{ route('catalogue.show') }}">Découvrir le catalogue</a>
            </div>
        @else
            <table class="panier-table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lignes as $ligne)
                        <tr>
                            <td class="produit-nom">{{ $ligne->produit->nom }}</td>
                            <td class="prix">{{ $ligne->prix_unitaire }} €</td>
                            <td>{{ $ligne->quantite }}</td>
                            <td class="prix">{{ $ligne->prix_unitaire * $ligne->quantite }} €</td>
                            <td>
                                <form action="{{ route('panier.destroy', $ligne->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-supprimer">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="panier-footer">
                <div class="panier-total">
                    Total : <span>{{ $lignes->sum(fn($l) => $l->prix_unitaire * $l->quantite) }} €</span>
                </div>
                <form action="{{ route('panier.valider') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-valider">
                        <i class="bi bi-bag-check"></i> Valider ma commande
                    </button>
                </form>
            </div>
        @endif

    </div>

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
