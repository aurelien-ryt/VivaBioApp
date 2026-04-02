<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - VivaBio</title>
    <link rel="stylesheet" href="/css/welcome.css">
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
