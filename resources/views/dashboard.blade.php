<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestionnaire</title>
</head>
<body>
    <h1>Dashboard</h1>

    <h2>Gestion Produits</h2>

    <table border="1">
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
            <tr>
                <td>{{ $produit->id }}</td>
                <td>{{ $produit->nom }}</td>
                <td>{{ number_format($produit->prix, 2) }} €</td>
                <td>{{ $produit->quantite_stock }}</td>
                <td>{{ $produit->seuil_alerte }}</td>
                
                <td><button type="button"><a href="{{ route('produits.edit', $produit->id) }}">Modifier l'article</a></button>
                    
                    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer « {{ $produit->nom }} » ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer l'article</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Aucun produit disponible</td>
            </tr>
            @endforelse
        </tbody>
            <button type="button"><a href="{{ route('produits.create', ) }}">Créer un article</a></button>
    </table>

        <h2>Gestion Utilisateur</h2>

        <table border="1">
        <thead> 
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Mot de passe </th>
                <th>Role</th>
                <th>Email</th>
                <th>Date de création du compte</th>
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
                <td>{{ $user->password }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>

                <td><button type="button"><a href="{{ route('user.edit', $user->id) }}">Modifier l'utilisateur</a></button>

                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer « {{ $user->nom }} » ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer l'utilisateur</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Aucun utilisateur disponible</td>
            </tr>
            @endforelse
        </tbody>
            <button type="button"><a href="{{ route('produits.create', ) }}">Créer un utilisateur</a></button>


        </table>

            <h2>Gestion Commandes</h2>

        <table border="1">
        <thead> 
            <tr>
                <th>ID</th>
                <th>Id de l'utilisateur </th>
                <th>Date de la commande</th>
                <th>Status</th>
                <th>Total €</th>
            </tr>
        </thead>
        <tbody>
            @forelse($commandes as $commande)
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->user_id }}</td>
                <td>{{ $commande->created_at }}</td>
                <td>{{ $commande->statut }}</td>
                <td>{{ $commande->total }}</td>

                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Aucun utilisateur disponible</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>