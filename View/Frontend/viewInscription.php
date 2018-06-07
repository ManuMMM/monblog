<?php $this->title = "Jean Forteroche"; ?>

<form action="#" method="post">
    <p>
        <input type="text" name="login" id="login" required/><br>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required/><br>
        <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Mot de passe" required/><br>
        <input type="text" name="email" id="email" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" required/><br><br>
        <input type="submit" value="S'inscrire" />
    </p>
    <p>
        Déja inscrit ? <a href="index.php?action=login">Se connecter</a>
    </p>
</form>
