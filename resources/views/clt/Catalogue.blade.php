<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VivaBio</title>

 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    @vite('resources/css/catalogue.css')
  </head>

  <body>
    
    <header class="navbar">
      <div>
        <a href="index.html" class="logo">VivaBio</a>   
        <nav class="menu">
          <a href="/">Accueil</a>
          <a href="/catalogue">Catalogue</a>
        </nav>
      </div>

      <div class="search-bar">
        <input type="text" placeholder="Rechercher un produit..." />
        <button><i class="bi bi-search"></i></button>
      </div>

      <div class="icons">
        <a href="#" class="user"><i class="bi bi-person"></i></a>
        <a href="/catalogue/panier" class="cart">
          <i class="bi bi-cart"></i>
          <span id="cartAmount" class="cartAmount">0</span>
        </a>
      </div>
    </header>

    <div class="banniere">
      🌿 Un <strong>contour des yeux</strong> offert pour tout achat d’un sérum visage !
    </div>


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
              <button class="btn-ajouter-panier" data-produit-id="{{ $produit->id }}">
                <i class="bi bi-cart-plus"></i> Ajouter au panier
              </button>
            </div>
          </div>
        @empty
          <div class="no-products">
            <p>Aucun produit disponible pour le moment.</p>
          </div>
        @endforelse
      </div>
    </section>
  </body>
</html>
