<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaBio - Dashboard Gestionnaire</title>
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

    <div class="container">

        {{-- SECTION PRODUITS --}}
        <div class="section">
            <div class="section-header">
                <h2><i class="bi bi-box-seam"></i> Produits</h2>
                <a class="btn btn-primary" href="{{ route('produits.create') }}">
                    <i class="bi bi-plus-lg"></i> Créer un article
                </a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th>Seuil alerte</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produits as $produit)
                            <tr>
                                <td class="id-cell">{{ $produit->id }}</td>
                                <td>{{ $produit->nom }}</td>
                                <td class="prix-cell">{{ number_format($produit->prix, 2) }} €</td>
                                <td @if($produit->quantite_stock <= $produit->seuil_alerte) class="low-stock" @endif>
                                    {{ $produit->quantite_stock }}
                                </td>
                                <td>{{ $produit->seuil_alerte }}</td>
                                <td>
                                    <div class="action-cell">
                                        <a class="btn btn-edit" href="{{ route('produits.edit', $produit->id) }}">
                                            <i class="bi bi-pencil"></i> Modifier
                                        </a>
                                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST"
                                              onsubmit="return confirm('Supprimer « {{ $produit->nom }} » ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Aucun produit disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SECTION UTILISATEURS --}}
        <div class="section">
            <div class="section-header">
                <h2><i class="bi bi-people"></i> Utilisateurs</h2>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Inscrit le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="id-cell">{{ $user->id }}</td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge badge-{{ $user->role }}">{{ $user->role }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="action-cell">
                                        <a class="btn btn-edit" href="{{ route('user.edit', $user->id) }}">
                                            <i class="bi bi-pencil"></i> Modifier
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                              onsubmit="return confirm('Supprimer « {{ $user->nom }} » ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Aucun utilisateur disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SECTION COMMANDES --}}
        <div class="section">
            <div class="section-header">
                <h2><i class="bi bi-bag-check"></i> Commandes</h2>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Utilisateur</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($commandes as $commande)
                            <tr>
                                <td class="id-cell">{{ $commande->id }}</td>
                                <td>{{ $commande->user_id }}</td>
                                <td>{{ \Carbon\Carbon::parse($commande->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge badge-{{ $commande->statut }}">{{ $commande->statut }}</span>
                                </td>
                                <td class="prix-cell">{{ number_format($commande->total, 2) }} €</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Aucune commande disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- FOOTER --}}
    <footer>
        <div class="copyright">&copy; 2025 VivaBio. Tous droits réservés.</div>
    </footer>

</body>
</html>
