<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
</head>
<body>
    <h1>Modifier l'utilisateur : {{ $user->nom }}</h1>

    @if ($errors->any())
        <div>
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

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $user->nom) }}" required>
        </div>

        <div>
            <label for="prenom">Prenom :</label>
            <textarea id="text" name="prenom" rows="4" required>{{ old('prenom', $user->prenom) }}</textarea>
        </div>

        <div>
            <label for="email">Email :</label>
            <textarea id="email" name="email" rows="4" required>{{ old('email', $user->email) }}</textarea>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="text" id="password" name="password" min="0" value="{{ old('password', $user->password) }}" required>
        </div>

        <div>
            <label for="role">Role :</label>
            <select name="role" id="role">
                <option value="gestionnaire" @selected(old('role', $user->role) === 'gestionnaire')>gestionnaire</option>
                <option value="client" @selected(old('role', $user->role) === 'client')>client</option>
            </select>
        </div>

        <div>
            <button type="submit">Mettre à jour</button>
            <a href="{{ route('gestionnaire.dashboard') }}">Annuler</a>
        </div>
    </form>
</body>
</html>