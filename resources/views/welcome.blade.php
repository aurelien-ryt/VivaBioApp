<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - VivaBio</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: sans-serif;
            background: #f4f7f2;
            color: #2d2d2d;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background: #3a7d44;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .logo {
            color: white;
            font-size: 1.4rem;
            font-weight: bold;
            text-decoration: none;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        nav ul a {
            color: white;
            text-decoration: none;
        }

        nav ul a:hover { text-decoration: underline; }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 3rem 1rem;
        }

        main h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #3a7d44;
        }

        main p {
            font-size: 1.1rem;
            color: #555;
            max-width: 500px;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 2rem;
            border-radius: 6px;
            font-size: 1rem;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-primary {
            background: #3a7d44;
            color: white;
            border: 2px solid #3a7d44;
        }

        .btn-primary:hover { background: #2f6437; }

        .btn-outline {
            background: transparent;
            color: #3a7d44;
            border: 2px solid #3a7d44;
        }

        .btn-outline:hover { background: #e8f4ea; }

        footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.85rem;
            color: #999;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

    <nav>
        <a class="logo" href="/">VivaBio</a>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/catalogue">Catalogue</a></li>
        </ul>
    </nav>

    <main>
        <h1>Bienvenue sur VivaBio</h1>
        <p>Découvrez notre sélection de produits biologiques et naturels, soigneusement sélectionnés pour votre bien-être.</p>

        <div class="actions">
            <a href="/login" class="btn btn-primary">Se connecter</a>
            <a href="/register" class="btn btn-outline">S'inscrire</a>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} VivaBio — Tous droits réservés
    </footer>

</body>
</html>
