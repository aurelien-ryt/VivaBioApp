<form method="POST" action=/registerSend>
    <?php echo csrf_field(); ?>
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <button type="submit">S'inscrire</button>
</form>
<?php /**PATH /home/debian/VivaBioApp/resources/views/auth/register.blade.php ENDPATH**/ ?>