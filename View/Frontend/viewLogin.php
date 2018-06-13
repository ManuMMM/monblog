<?php $this->title = "Jean Forteroche"; ?>

<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        // Declaring variables
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Calling the login function
        $usermanager = new UserManager();
        $logged = $usermanager->login($username, $password);
        if($logged === TRUE){
            header('location:index.php?action=');
        }
        else{
            $message = 'Identifiant ou mot de passe incorrect';
        }
    }
?>

<form action="index.php?action=loginpage" method="post">
    <p>
        <?php if(isset($message)){echo $message;} ?><br>
        <input type="text" name="username" id="username" <?php if(isset($username)) { ?>value="<?php echo $username; ?>"<?php } ?> placeholder="Identifiant" required/><br>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required/><br>
        <input type="checkbox" name="rememberMe" id="rememberMe"><label for="rememberMe">Se souvenir de moi</label><br>
        <input type="submit" value="Se connecter" />
    </p>
    <p>
        Vous n'avez pas de compte ? <a href="index.php?action=signinpage">S'inscrire</a>
    </p>
</form>