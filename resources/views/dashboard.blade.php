<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestionnaire</title>
</head>
<body>
    <h1>Dashboard Gestionnaire - Produits</h1>

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
                <td><button type="button"> <a href="/produits/"{id}>Modifier l'article</a></button>
                    <button type="button">Supprimer l'article</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Aucun produit disponible</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>