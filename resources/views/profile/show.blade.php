<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VivaBio - Mon Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/produit.css">
    <style>
        .profil-detail {
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .profil-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            overflow: hidden;
        }

        .profil-header {
            background-color: var(--light-blue-green);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem;
            font-size: 5rem;
            color: white;
        }

        .profil-body {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .profil-body h1 {
            font-size: 1.6rem;
            color: var(--anthracite);
            margin-bottom: 0.5rem;
        }

        .profil-champ {
            background: var(--off-white);
            border-radius: 8px;
            padding: 1rem 1.2rem;
        }

        .profil-champ label {
            font-size: 0.8rem;
            color: var(--willow);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 0.3rem;
        }

        .profil-champ p {
            font-size: 1rem;
            font-weight: 600;
            color: var(--anthracite);
            margin: 0;
        }

        .profil-role {
            display: inline-block;
            background-color: var(--sage);
            color: white;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
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
            <a href="/panier" class="cart">
                <i class="bi bi-cart"></i>
            </a>
        </div>
    </header>

    {{-- PROFIL --}}
    <div class="profil-detail">

        <a href="{{ route('catalogue.show') }}" class="retour">
            <i class="bi bi-arrow-left"></i> Retour au catalogue
        </a>

        <div class="profil-card">
            <div class="profil-header">
                <i class="bi bi-person-circle"></i>
            </div>

            <div class="profil-body">
                <h1>{{ $user->prenom }} {{ $user->nom }}</h1>
                <span class="profil-role">{{ ucfirst($user->role ?? 'client') }}</span>

                <div class="profil-champ">
                    <label>Nom</label>
                    <p>{{ $user->nom }}</p>
                </div>

                <div class="profil-champ">
                    <label>Prénom</label>
                    <p>{{ $user->prenom }}</p>
                </div>

                <div class="profil-champ">
                    <label>Email</label>
                    <p>{{ $user->email }}</p>
                </div>

                {{-- FORMULAIRE MODIFICATION PROFIL --}}
                <form method="POST" action="{{ route('profile.update') }}" style="margin-top: 1.5rem; border-top: 1px solid #eee; padding-top: 1.5rem;">
                    @csrf
                    @method('PATCH')

                    @if (session('status') === 'profile-updated')
                        <p style="color: green; margin-bottom: 1rem;">Profil mis à jour avec succès.</p>
                    @endif

                    <div style="margin-bottom: 1rem;">
                        <label for="nom" style="font-size: 0.8rem; color: var(--willow); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.3rem;">Nom (2 à 255 caractères)</label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom', $user->nom) }}" placeholder="Ex: Dupont" minlength="2" maxlength="255" required
                            style="width: 100%; padding: 0.6rem 0.8rem; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem;">
                        @error('nom') <p style="color: red; font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</p> @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label for="prenom" style="font-size: 0.8rem; color: var(--willow); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.3rem;">Prénom (2 à 255 caractères)</label>
                        <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}" placeholder="Ex: Jean" minlength="2" maxlength="255" required
                            style="width: 100%; padding: 0.6rem 0.8rem; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem;">
                        @error('prenom') <p style="color: red; font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</p> @enderror
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <label for="email" style="font-size: 0.8rem; color: var(--willow); text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.3rem;">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Ex: jean.dupont@email.com" required
                            style="width: 100%; padding: 0.6rem 0.8rem; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem;">
                        @error('email') <p style="color: red; font-size: 0.85rem; margin-top: 0.3rem;">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" style="
                        background-color: var(--sage);
                        color: white;
                        border: none;
                        padding: 0.7rem 1.4rem;
                        border-radius: 6px;
                        cursor: pointer;
                        font-size: 0.95rem;
                    ">Enregistrer les modifications</button>
                </form>

                <form action="{{ route('users.logout') }}" method="POST" style="margin-top: 0.5rem;">
                    @csrf
                    <button type="submit" style="
                        background: none;
                        border: 1px solid #ccc;
                        padding: 0.7rem 1.2rem;
                        border-radius: 6px;
                        cursor: pointer;
                        color: var(--willow);
                        font-size: 0.95rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        transition: all 0.2s;
                    ">
                        <i class="bi bi-box-arrow-right"></i> Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>VivaBio</h3>
                <p>VivaBio s'engage à vous proposer des produits biologiques de qualité.</p>
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
