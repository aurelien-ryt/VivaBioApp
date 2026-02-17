<<<<<<< HEAD
@extends('template')

@section('contenu')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4">Connexion</h3>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('users.login.post') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email"
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success w-100">Se connecter</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('users.register') }}">Pas encore de compte ? S'inscrire</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
=======
<!doctype html>
<html lang="fr">
	<head>
		<meta charset='utf-8'>
		<meta http-equiv="Cache-Control" content="no-store" />
		<title>Page de connexion</title>
	</head>
	<body>
		<h3>Connexion</h3>
		<hr/>
		
		@if( !empty( $connexion_nok ) )
		
			<p>Connexion refusée.</p>
		
		@endif
		
		<form method="POST" action="/loginSend">
		
			{{ csrf_field() }}
			
			<label for="email">Nom de connexion : </label>
			<br/>
			<input type="text" name="email" id="email">
			<br/><br/>
			<label for="password">Mot de passe : </label>
			<br/>
			<input type="password" name="password" id="password">
			<br/><br/>
			<input type="submit" value="Se connecter">
		</form>
		
	</body>
</html>
>>>>>>> 51e79976 (Adding some features)
