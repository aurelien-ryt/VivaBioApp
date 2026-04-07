<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestionnaire</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@300;400;500&display=swap');

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #0e0e0f;
            color: #f0f0f0;
            font-family: 'DM Mono', monospace;
            font-size: 0.875rem;
            min-height: 100vh;
            padding: 48px 32px;
            line-height: 1.5;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .section {
            margin-bottom: 56px;
        }

        h1 {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #f0f0f0;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #2a2a2e;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        h1::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 1.4rem;
            background: #e8ff47;
            border-radius: 2px;
            flex-shrink: 0;
        }

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #2a2a2e;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        thead {
            background: #161618;
        }

        thead th {
            font-family: 'Syne', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #6b6b75;
            padding: 14px 20px;
            text-align: left;
            border-bottom: 1px solid #2a2a2e;
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid #1c1c1f;
            transition: background 0.15s ease;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: rgba(232, 255, 71, 0.04);
        }

        tbody td {
            padding: 14px 20px;
            color: #c8c8d0;
            vertical-align: middle;
        }

        tbody td:first-child {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            color: #6b6b75;
            font-size: 0.72rem;
            letter-spacing: 0.05em;
        }

        tbody td:nth-child(2) {
            font-weight: 500;
            color: #f0f0f0;
        }

        tbody td:nth-child(3) {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            color: #e8ff47;
        }

        tbody td:nth-child(5) {
            color: #6b6b75;
        }

        tr.stock-low td:nth-child(4) {
            color: #ff5757;
            font-weight: 700;
        }

        tbody td[colspan] {
            text-align: center;
            padding: 48px 20px;
            color: #6b6b75;
            font-style: italic;
        }

        .action-cell {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            font-family: 'DM Mono', monospace;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.03em;
            padding: 7px 14px;
            border-radius: 4px;
            cursor: pointer;
            border: 1px solid;
            transition: background 0.15s ease, color 0.15s ease, border-color 0.15s ease;
            text-decoration: none;
            white-space: nowrap;
            background: transparent;
            line-height: 1;
        }

        .btn-edit {
            border-color: #3a3a42;
            color: #a8a8b8;
        }

        .btn-edit:hover {
            background: rgba(168, 168, 184, 0.08);
            border-color: #6b6b75;
            color: #f0f0f0;
        }

        .btn-danger {
            border-color: rgba(255, 87, 87, 0.35);
            color: #ff5757;
        }

        .btn-danger:hover {
            background: rgba(255, 87, 87, 0.1);
            border-color: #ff5757;
        }

        .btn-primary {
            background: #e8ff47;
            border-color: #e8ff47;
            color: #0e0e0f;
            font-weight: 700;
        }

        .btn-primary:hover {
            background: #d4eb2e;
            border-color: #d4eb2e;
        }

        .table-footer {
            margin-top: 12px;
            display: flex;
            justify-content: flex-end;
        }

        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #161618; }
        ::-webkit-scrollbar-thumb { background: #2a2a2e; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #3a3a42; }
    </style>
</head>
<body>
<div class="container">

    {{-- SECTION PRODUITS --}}
    <div class="section">
        <h1>Dashboard Gestionnaire — Produits</h1>

        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Seuil Alerte</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($produits as $produit)
                    <tr @if($produit->quantite_stock <= $produit->seuil_alerte) class="stock-low" @endif>
                        <td>{{ $produit->id }}</td>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ number_format($produit->prix, 2) }} €</td>
                        <td>{{ $produit->quantite_stock }}</td>
                        <td>{{ $produit->seuil_alerte }}</td>
                        <td>
                            <div class="action-cell">
                                <a class="btn btn-edit" href="{{ route('produits.edit', $produit->id) }}">Modifier</a>
                                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST"
                                      onsubmit="return confirm('Supprimer « {{ $produit->nom }} » ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Aucun produit disponible</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            <a class="btn btn-primary" href="{{ route('produits.create') }}">+ Créer un article</a>
        </div>
    </div>

    {{-- SECTION UTILISATEURS --}}
    <div class="section">
        <h1>Dashboard Gestionnaire — Utilisateurs</h1>

        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Créé le</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                        <td>
                            <div class="action-cell">
                                <a class="btn btn-edit" href="{{ route('user.edit', $user->id) }}">Modifier</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Supprimer « {{ $user->nom }} » ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Aucun utilisateur disponible</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- SECTION COMMANDES --}}
    <div class="section">
        <h1>Dashboard Gestionnaire — Commandes</h1>

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
                        <td>{{ $commande->id }}</td>
                        <td>{{ $commande->user_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($commande->created_at)->format('d/m/Y') }}</td>
                        <td>{{ $commande->statut }}</td>
                        <td>{{ number_format($commande->total, 2) }} €</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucune commande disponible</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
