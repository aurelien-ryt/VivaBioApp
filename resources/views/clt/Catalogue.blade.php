<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VivaBio</title>

 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue VivaBio - Produits Bio de Qualité</title>
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
        
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--sage);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav li {
            margin-left: 1.5rem;
        }
        
        nav a {
            text-decoration: none;
            color: var(--anthracite);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: var(--sage);
        }
        
        .hero {
            background: linear-gradient(rgba(123, 174, 127, 0.9), rgba(123, 174, 127, 0.7)), url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 4rem 2rem;
            margin-bottom: 3rem;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--honey);
            color: var(--anthracite);
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #d9a342;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--sage);
            font-size: 2rem;
        }
        
        .category-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .category-btn {
            background-color: white;
            border: 1px solid var(--light-blue-green);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .category-btn.active, .category-btn:hover {
            background-color: var(--sage);
            color: white;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }
        
        .product-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .product-image {
            height: 200px;
            background-color: var(--light-blue-green);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .product-info {
            padding: 1.5rem;
        }
        
        .product-category {
            color: var(--willow);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .product-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--anthracite);
        }
        
        .product-description {
            color: var(--willow);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
        
        .product-price {
            font-weight: bold;
            color: var(--sage);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        
        .add-to-cart {
            background-color: var(--sage);
            color: white;
            border: none;
            padding: 0.7rem 1rem;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .add-to-cart:hover {
            background-color: #6a9c6e;
        }
        
        footer {
            background-color: var(--anthracite);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
        }
        
        .footer-section h3 {
            color: var(--sage);
            margin-bottom: 1rem;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section li {
            margin-bottom: 0.5rem;
        }
        
        .footer-section a {
            color: var(--off-white);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-section a:hover {
            color: var(--sage);
        }
        
        .copyright {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid var(--willow);
            text-align: center;
            color: var(--willow);
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            header {
                flex-direction: column;
                padding: 1rem;
            }
            
            nav ul {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav li {
                margin: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">VivaBio</div>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Catalogue</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Connexion</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="hero">
        <h1>Bienvenue chez VivaBio</h1>
        <p>Découvrez des produits bio de qualité, cultivés avec respect pour la nature et votre santé.</p>
        <a href="#produits" class="btn">Voir les produits</a>

    </section>
    
    <div class="container">
        <h2 class="section-title" id="produits">Notre Catalogue de Produits</h2>
        
        <div class="category-filters">
            <button class="category-btn active">Tous les produits</button>
            <button class="category-btn">Fruits & Légumes</button>
            <button class="category-btn">Épicerie</button>
            <button class="category-btn">Boissons</button>
            <button class="category-btn">Cosmétiques</button>
        </div>
        
        <div class="products-grid">
            <!-- Produit 1 -->
            <div class="product-card">
                <div class="product-image" style="background-color: #A7C7A9;">
                    Image Produit
                </div>
                <div class="product-info">
                    <div class="product-category">Fruits & Légumes</div>
                    <h3 class="product-title">Pommes Golden Bio</h3>
                    <p class="product-description">Pommes juteuses et croquantes, cultivées sans pesticides.</p>
                    <div class="product-price">4,90 € / kg</div>
                    <button class="add-to-cart">Ajouter au panier</button>
                </div>
            </div>
            
            <!-- Produit 2 -->
            <div class="product-card">
                <div class="product-image" style="background-color: #E6B450;">
                    Image Produit
                </div>
                <div class="product-info">
                    <div class="product-category">Épicerie</div>
                    <h3 class="product-title">Miel de Lavande</h3>
                    <p class="product-description">Miel pur de lavande, récolté artisanalement en Provence.</p>
                    <div class="product-price">8,50 € / pot</div>
                    <button class="add-to-cart">Ajouter au panier</button>
                </div>
            </div>
            
            <!-- Produit 3 -->
            <div class="product-card">
                <div class="product-image" style="background-color: #7BAE7F;">
                    Image Produit
                </div>
                <div class="product-info">
                    <div class="product-category">Boissons</div>
                    <h3 class="product-title">Jus de Grenade Bio</h3>
                    <p class="product-description">Jus 100% pur fruit, sans sucre ajouté, riche en antioxydants.</p>
                    <div class="product-price">3,20 € / bouteille</div>
                    <button class="add-to-cart">Ajouter au panier</button>
                </div>
            </div>
            
            <!-- Produit 4 -->
            <div class="product-card">
                <div class="product-image" style="background-color: #F9FAF7; color: #2E2E2E;">
                    Image Produit
                </div>
                <div class="product-info">
                    <div class="product-category">Cosmétiques</div>
                    <h3 class="product-title">Crème Hydratante à l'Aloe Vera</h3>
                    <p class="product-description">Crème nourrissante pour peaux sensibles, 100% naturelle.</p>
                    <div class="product-price">12,90 € / tube</div>
                    <button class="add-to-cart">Ajouter au panier</button>
                </div>
            </div>
            
            <!-- Produit 5 -->
            <div class="product-card">
                <div class="product-image" style="background-color: #A7C7A9;">
                    Image Produit
                </div>
                <div class="product-info">
                    <div class="product-category">Fruits & Légumes</div>
                    <h3 class="product-title">Carottes Bio</h3>
                    <p class="product-description">Carottes croquantes et sucrées, parfaites pour vos recettes.</p>
                    <div class="product-price">2,80 € / botte</div>
                    <button class="add-to-cart">Ajouter au panier</button>
                </div>
            </div>
            
            <!-- Produit 6 -->
            <div class="product-card">
                <div class="product-image" style="background-color: #E6B450;">
                    Image Produit
                </div>
                <div class="product-info">
                    <div class="product-category">Épicerie</div>
                    <h3 class="product-title">Pâtes Complètes Bio</h3>
                    <p class="product-description">Pâtes artisanales à base de blé complet biologique.</p>
                    <div class="product-price">3,50 € / paquet</div>
                    <button class="add-to-cart">Ajouter au panier</button>
                </div>
            </div>
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
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Catalogue</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
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
    
    <script>
        // Filtrage des catégories
        document.querySelectorAll('.category-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Retirer la classe active de tous les boutons
                document.querySelectorAll('.category-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');
                
                // Ici, vous pourriez ajouter la logique pour filtrer les produits
                // en fonction de la catégorie sélectionnée
            });
        });
        
        // Ajout au panier
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productTitle = this.closest('.product-card').querySelector('.product-title').textContent;
                alert(`"${productTitle}" a été ajouté à votre panier !`);
                
                // Ici, vous pourriez ajouter la logique pour ajouter le produit au panier
            });
        });
    </script>
</body>
</html>