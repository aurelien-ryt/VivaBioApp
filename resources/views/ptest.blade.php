<?php
echo "<h1>Traitement du formulaire d'inscription</h1>";
        include 'register.php';

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "Nom: $nom, Prénom: $prenom, Email: $email, Mot de passe: $password";
?>
