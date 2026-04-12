<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaBio - Mes commandes</title>
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

        body {
            background-color: var(--off-white);
            color: var(--anthracite);
            line-height: 1.6;
        }

        /* NAVBAR */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar > div { display: flex; align-items: center; gap: 2rem; }

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

        .icons { display: flex; align-items: center; gap: 1rem; }

        .icons a {
            text-decoration: none;
            color: var(--anthracite);
            font-size: 1.3rem;
        }

        /* CONTENU */
        .page-content {
            max-width: 900px;
            margin: 2.5rem auto;
            padding: 0 1rem;
        }

        /* EN-TÊTE PAGE */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 2rem;
            color: var(--sage);
        }

        .badge-count {
            background-color: var(--sage);
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 5px 14px;
            border-radius: 20px;
        }

        /* ÉTAT VIDE */
        .empty-state {
            text-align: center;
            padding: 4rem 0;
            color: var(--willow);
        }

        .empty-state i {
            font-size: 3.5rem;
            color: var(--light-blue-green);
            margin-bottom: 1rem;
            display: block;
        }

        .empty-state p { font-size: 1rem; }

        .empty-state a {
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

        .empty-state a:hover { background-color: #6a9c6e; }

        /* LISTE */
        .commandes-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* CARTE COMMANDE */
        .commande-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .commande-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .commande-left {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .commande-icon {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background-color: #eef5ee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--sage);
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .commande-id {
            font-weight: 700;
            font-size: 1rem;
            color: var(--anthracite);
        }

        .commande-date {
            font-size: 0.85rem;
            color: var(--willow);
            margin-top: 2px;
        }

        .commande-right {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .commande-total {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--sage);
            white-space: nowrap;
        }

        /* BADGES STATUT */
        .badge-statut {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .badge-pending    { background-color: #FFF4E0; color: #B07A00; }
        .badge-completed  { background-color: #E6F4EA; color: #2E7D32; }
        .badge-cancelled  { background-color: #FDECEA; color: #C62828; }
        .badge-default    { background-color: #F0F0F0; color: var(--willow); }

        .btn-detail {
            text-decoration: none;
            border: 1px solid var(--sage);
            color: var(--sage);
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
            transition: background 0.2s;
        }

        .btn-detail:hover {
            background-color: #eef5ee;
        }

        .btn-annuler {
            background: none;
            border: 1px solid var(--danger, #e53935);
            color: #e53935;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-annuler:hover {
            background-color: #FDECEA;
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
        .footer-section a { color: var(--off-white); text-decoration: none; transition: color 0.3s; }
        .footer-section a:hover { color: var(--sage); }

        .copyright {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid var(--willow);
            text-align: center;
            color: var(--willow);
        }

        @media (max-width: 560px) {
            .commande-total { display: none; }
            .page-header h1 { font-size: 1.5rem; }
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
                <a href="{{ route('commande.show') }}">Commandes</a>
            </nav>
        </div>
        <div class="icons">
            <a href="{{ route('profil.user') }}"><i class="bi bi-person"></i></a>
            <a href="/panier"><i class="bi bi-cart"></i></a>
        </div>
    </header>

    <div class="page-content">

        {{-- Message de confirmation --}}
        @if(session('success'))
            <p style="background-color: #E6F4EA; color: #2E7D32; padding: 0.8rem 1.2rem; border-radius: 6px; margin-bottom: 1.5rem;">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
            </p>
        @endif

        {{-- En-tête --}}
        <div class="page-header">
            <h1><i class="bi bi-bag-check"></i> Mes commandes</h1>
            <span class="badge-count">{{ $commandes_client->count() }} commande(s)</span>
        </div>

        {{-- Liste --}}
        @if($commandes_client->isEmpty())
            <div class="empty-state">
                <i class="bi bi-bag-x"></i>
                <p>Vous n'avez pas encore passé de commande.</p>
                <a href="{{ route('catalogue.show') }}">Découvrir le catalogue</a>
            </div>
        @else
            <div class="commandes-list">
                @foreach($commandes_client as $commande)
                    @php
                        $statusClass = match(strtolower($commande->statut ?? '')) {
                            'en attente', 'en_attente', 'pending' => 'badge-pending',
                            'terminée', 'completed'               => 'badge-completed',
                            'annulée', 'cancelled'                => 'badge-cancelled',
                            default                               => 'badge-default',
                        };
                    @endphp

                    <div class="commande-card">
                        <div class="commande-left">
                            <div class="commande-icon">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div>
                                <div class="commande-id">Commande #{{ $commande->id }}</div>
                                <div class="commande-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ \Carbon\Carbon::parse($commande->created_at)->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>

                        <div class="commande-right">
                            @if($commande->statut ?? false)
                                <span class="badge-statut {{ $statusClass }}">{{ $commande->statut }}</span>
                            @endif
                            @if($commande->total ?? false)
                                <span class="commande-total">{{ number_format($commande->total, 2, ',', ' ') }} €</span>
                            @endif

                            <a href="{{ route('commande.detail', $commande->id) }}" class="btn-detail">Voir le détail</a>

                            {{-- Bouton annuler : seulement si la commande est en attente --}}
                            @if($commande->statut === 'en_attente')
                                <form method="POST" action="{{ route('commande.annuler', $commande->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn-annuler">Annuler</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
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
