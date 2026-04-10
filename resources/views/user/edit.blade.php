<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VivaBio - Modifier un utilisateur</title>
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

    <div class="form-page">
        <div class="form-card">
            <h1><i class="bi bi-person-gear"></i> Modifier : {{ $user->nom }}</h1>

            @if ($errors->any())
                <div class="form-errors">
                    <strong>Erreurs :</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $user->nom) }}" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Laisser vide pour conserver l'actuel">
                </div>

                <div class="form-group">
                    <label for="role">Rôle</label>
                    <select name="role" id="role">
                        <option value="gestionnaire" @selected(old('role', $user->role) === 'gestionnaire')>Gestionnaire</option>
                        <option value="client" @selected(old('role', $user->role) === 'client')>Client</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i>&nbsp; Enregistrer
                    </button>
                    <a href="{{ route('gestionnaire.dashboard') }}" class="btn-cancel">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="copyright">&copy; 2025 VivaBio. Tous droits réservés.</div>
    </footer>

</body>
</html>
