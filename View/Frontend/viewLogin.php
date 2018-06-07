<?php $this->title = "Jean Forteroche"; ?>

<form action="#" method="post">
    <p>
        <input type="text" name="login" id="login" placeholder="Identifiant" required/><br>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required/><br>
        <input type="checkbox" name="rememberMe" id="rememberMe"><label for="rememberMe">Se souvenir de moi</label><br>
        <input type="submit" value="Se connecter" />
    </p>
    <p>
        Vous n'avez pas de compte ? <a href="index.php?action=signin">S'inscrire</a>
    </p>
</form>