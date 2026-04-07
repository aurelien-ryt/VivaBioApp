<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaBio - Commande #{{ $commande->id }}</title>
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

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        body { background-color: var(--off-white); color: var(--anthracite); line-height: 1.6; }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar > div { display: flex; align-items: center; gap: 2rem; }

        .logo { font-size: 1.8rem; font-weight: bold; color: var(--sage); text-decoration: none; }

        .menu a {
            text-decoration: none;
            color: var(--anthracite);
            font-weight: 500;
            margin-left: 1.5rem;
            transition: color 0.3s;
        }

        .menu a:hover { color: var(--sage); }

        .icons { display: flex; align-items: center; gap: 1rem; }
        .icons a { text-decoration: none; color: var(--anthracite); font-size: 1.3rem; }

        .page-content { max-width: 900px; margin: 2.5rem auto; padding: 0 1rem; }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .page-header h1 { font-size: 2rem; color: var(--sage); }

        .btn-retour {
            text-decoration: none;
            color: var(--willow);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            transition: color 0.3s;
        }

        .btn-retour:hover { color: var(--sage); }

        /* INFOS COMMANDE */
        .commande-info {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .commande-info-left { display: flex; flex-direction: column; gap: 0.3rem; }
        .commande-info-left span:first-child { font-weight: 700; font-size: 1.1rem; }
        .commande-info-left span:last-child { font-size: 0.85rem; color: var(--willow); }

        .badge-statut {
            font-size: 0.78rem;
            font-weight: 600;
            padding: 4px 14px;
            border-radius: 20px;
        }

        .badge-pending   { background-color: #FFF4E0; color: #B07A00; }
        .badge-completed { background-color: #E6F4EA; color: #2E7D32; }
        .badge-cancelled { background-color: #FDECEA; color: #C62828; }
        .badge-default   { background-color: #F0F0F0; color: var(--willow); }

        /* TABLE LIGNES */
        .lignes-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        table { width: 100%; border-collapse: collapse; }

        thead { background-color: #eef5ee; }

        thead th {
            padding: 0.85rem 1.25rem;
            text-align: left;
            font-size: 0.85rem;
            color: var(--sage);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        thead th.text-right { text-align: right; }

        tbody td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.95rem;
        }

        tbody tr:last-child td { border-bottom: none; }

        tbody tr:hover { background-color: #fafcfa; }

        .produit-nom { font-weight: 600; color: var(--anthracite); }

        td.text-right { text-align: right; }

        .sous-total { font-weight: 700; color: var(--sage); }

        /* TOTAL */
        .total-row {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 1.1rem 1.5rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
            font-size: 1.05rem;
        }

        .total-row span:first-child { color: var(--willow); }
        .total-row span:last-child { font-weight: 700; font-size: 1.25rem; color: var(--sage); }

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
        .footer-section a { color: var(--off-white); text-decoration: none; transition: color 0.3s; }
        .footer-section a:hover { color: var(--sage); }

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
            <a href="/panier"><i class="bi bi-cart"></i></a>
        </div>
    </header>

    <div class="page-content">

        <div class="page-header">
            <h1><i class="bi bi-receipt"></i> Commande #{{ $commande->id }}</h1>
            <a href="{{ route('commande.show') }}" class="btn-retour">
                <i class="bi bi-arrow-left"></i> Retour à mes commandes
            </a>
        </div>

        {{-- Infos générales --}}
        @php
            $statusClass = match(strtolower($commande->statut ?? '')) {
                'en attente', 'en_attente', 'pending' => 'badge-pending',
                'terminée', 'completed'               => 'badge-completed',
                'annulée', 'cancelled'                => 'badge-cancelled',
                default                               => 'badge-default',
            };
        @endphp

        <div class="commande-info">
            <div class="commande-info-left">
                <span>Commande #{{ $commande->id }}</span>
                <span><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($commande->created_at)->format('d/m/Y') }}</span>
            </div>
            <span class="badge-statut {{ $statusClass }}">{{ $commande->statut }}</span>
        </div>

        {{-- Lignes de commande --}}
        <div class="lignes-card">
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th class="text-right">Prix unitaire</th>
                        <th class="text-right">Quantité</th>
                        <th class="text-right">Sous-total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lignes as $ligne)
                        <tr>
                            <td class="produit-nom">{{ $ligne->produit->nom ?? 'Produit supprimé' }}</td>
                            <td class="text-right">{{ number_format($ligne->prix_unitaire, 2, ',', ' ') }} €</td>
                            <td class="text-right">{{ $ligne->quantite }}</td>
                            <td class="text-right sous-total">{{ number_format($ligne->prix_unitaire * $ligne->quantite, 2, ',', ' ') }} €</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center; color: var(--willow); padding: 2rem;">
                                Aucun détail disponible pour cette commande.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Total --}}
        <div class="total-row">
            <span>Total</span>
            <span>{{ number_format($commande->total, 2, ',', ' ') }} €</span>
        </div>

    </div>

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
