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
		
		<?php if( !empty( $connexion_nok ) ): ?>
		
			<p>Connexion refusée.</p>
		
		<?php endif; ?>
		
		<form method="POST" action="/loginSend">
		
			<?php echo e(csrf_field()); ?>

			
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
</html><?php /**PATH /home/debian/VivaBioApp/resources/views/auth/login.blade.php ENDPATH**/ ?>