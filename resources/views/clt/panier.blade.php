<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panier d'achat</title>
  <link rel="stylesheet" href="/css/panier.css">
</head>
<body>

  <div class="bandeau">
     VivaBio - Votre panier d'achat
  </div>

  <div class="panier-container">

    @if(empty($lignes) || count($lignes) == 0)
      <p>Votre panier est vide.</p>
    @else
      <table>
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
              <td>{{ $ligne->produit->nom }}</td>
              <td>{{ $ligne->prix_unitaire }} €</td>
              <td>{{ $ligne->quantite }}</td>
              <td>{{ $ligne->prix_unitaire * $ligne->quantite }} €</td>
              <td>
                <form action="{{ route('panier.destroy', $ligne->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

  </div>

</body>
</html>